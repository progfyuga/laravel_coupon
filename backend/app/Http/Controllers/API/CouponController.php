<?php

namespace App\Http\Controllers\API;

use App\Coupon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function latest_5()
    {
        $coupons = Coupon::where('release_status',true)
            ->orderByDesc('id')
            ->limit(5)
            ->get();

        return $coupons;
    }
}
