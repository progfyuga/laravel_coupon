<?php

namespace App\Http\Controllers\Main;

use App\Coupon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class MainController extends Controller
{
    public function index($key_word = '')
    {
        $coupons = Coupon::where('release_status', 1)
            ->orderByDesc('id')
            ->paginate(6);

        $shops = User::where('map_status',1)
            ->select(['id','lat','lng'])
            ->get();

        $pack = [
            'key_word' => $key_word,
            'coupons' => $coupons,
            'shops' => $shops->toArray(),
        ];

        return view('main.top',$pack);
    }

    public function key_word(Request $request)
    {
        return $this->index($request->key_word);
    }

}
