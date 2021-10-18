<?php

namespace App\Http\Controllers\Main;

use App\Coupon;
use App\Http\Controllers\Controller;
use App\Tag;
use Illuminate\Http\Request;
use App\User;

class MainController extends Controller
{
    public function index($key_word = '',$search_word = '')
    {
        if($search_word){
            //クーポン名、店舗名で検索
            $coupons = Coupon::where('release_status', 1)
                ->where('coupon_name', 'like', "%$search_word%")
                ->orWhereHas('user', function($query) use ($search_word) {
                    $query->where('name', 'like', "%$search_word%");
                })
                ->orWhereHas('tags', function($query) use ($search_word) {
                    $query->where('name', 'like', "%$search_word%");
                })
                ->orderByDesc('id')
                ->paginate(6);
        }else{
            $coupons = Coupon::where('release_status', 1)
                ->orderByDesc('id')
                ->paginate(6);
        }


        $shops = User::where('map_status',1)
            ->select(['id','lat','lng'])
            ->get();

        $tags = Tag::get();

        $pack = [
            'key_word' => $key_word,
            'coupons' => $coupons,
            'shops' => $shops->toArray(),
            'tags' => $tags,
            'search_word' => $search_word,
        ];

        return view('main.top',$pack);
    }

    public function key_word(Request $request)
    {
        return $this->index($request->key_word,'');
    }

    public function search_coupon(Request $request)
    {
        return $this->index('',$request->search_word);
    }

}
