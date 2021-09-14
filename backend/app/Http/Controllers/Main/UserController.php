<?php

namespace App\Http\Controllers\Main;

use App\Coupon;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index($id)
    {
        $user = User::where('id',$id)
            ->with('prefecture')
            ->firstOrFail();

        $coupons = Coupon::where('user_id',$id)
            ->where('release_status',1)
            ->paginate(6);

        return view('main.user_detail')->with([
            'coupons' => $coupons,
            'user' => $user,
        ]);
    }
}
