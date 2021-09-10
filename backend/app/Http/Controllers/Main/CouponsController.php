<?php

namespace App\Http\Controllers\Main;

use App\Coupon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CouponsController extends Controller
{
    public function index($id)
    {
        $coupon = Coupon::where('release_status',1)
            ->where('id',$id)
            ->with('user')
            ->firstOrFail();

        return view('main.coupon_detail')->with([
            'coupon' => $coupon,
        ]);
    }
}
