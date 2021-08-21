<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        return view('Main.top');
    }

    public function promotion()
    {
        return view('Main.purchase_promotion');
    }

    public function buy()
    {
        return view('Main.buy');
    }

    public function purchaseCompletedStore(Request $request){

        //TODO:ここでメール送ったりトークン発行したり
        return redirect(route('main.purchase_completed'));
    }

    public function purchaseCompleted(){
        return view('Main.purchase_completed');
    }

}
