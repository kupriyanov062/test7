<?php

namespace App\Http\Repository;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\{wallets, deposits, transactions};
use DB;
class Wallet
{

    public function getWalletsUser($userID)
    {
        return wallets::where('user_id', $userID)->first();
    }

    public static function putDeposite()
    {
        foreach (wallets::all() as $wallet) {
            $deposits = deposits::where('wallet_id', $wallet->id)->first();
            if (($deposits->active == 1) and ($wallet->balance > 0) and ($deposits->duration < 10)) {
                DB::transaction(function () use ($wallet, $deposits) {
                    transactions::create(['user_id' => 0,
                        'wallet_id' => $wallet->id,
                        'type' => 2,
                        'deposit_id' => 0,
                        'amount' => ((($wallet->balance) / 100) * 20)]);
                    deposits::where('id', $deposits->id)->update(array('duration' => ($deposits->duration + 1)));
                }, 0);
            } elseif (($deposits->active == 1) and ($wallet->balance > 0) and ($deposits->duration >= 10)) {
                DB::transaction(function () use ($deposits) {
                    deposits::where('id', $deposits->id)->update(array('active' => 0));
                }, 0);
            }
        }

    }

}
