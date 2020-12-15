<?php

namespace App\Http\Controllers;
use App\{Http\Repository\Wallet, wallets};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wallets = wallets::where('user_id', Auth::user()->id)->first();
        return view('home',['wallets'=>$wallets]);
    }

    public function test()
    {
       Wallet::putDeposite();
       exit();
    }
}
