<?php

namespace App\Http\Controllers\User;

use App\Coupon;
use App\Http\Controllers\Controller;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class MemberController extends Controller
{
    public function index()
    {
        $user = User::where('id',Auth::id())
            ->with('prefecture')
            ->firstOrFail();

        $coupons = Coupon::where('user_id',Auth::id())
            ->where('release_status',1)
            ->paginate(6);

        return view('Member.top')->with([
            'coupons' => $coupons,
            'user' => $user,
        ]);
    }
}
