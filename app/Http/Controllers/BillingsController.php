<?php

namespace App\Http\Controllers;

use App\{deposits, transactions};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Http\Repository\Wallet;

class BillingsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public $data, $walletUser;

    public function __construct(Request $request, Wallet $wallet)
    {
        $this->middleware('auth');
        $this->data = $request;
        $this->walletUser = $wallet;
    }

    public function put()
    {
        $wallet_id = $this->walletUser->getWalletsUser(Auth::user()->id)->id;
        DB::transaction(function () use ($wallet_id) {
            transactions::create(['user_id' => Auth::user()->id,
                'wallet_id' => $wallet_id,
                'type' => 1,
                'deposit_id' => 0,
                'amount' => $this->data->money]);

        }, 0);
        return redirect('home');
    }

}
