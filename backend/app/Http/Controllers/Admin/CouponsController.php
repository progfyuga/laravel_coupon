<?php

namespace App\Http\Controllers\Admin;

use App\Coupon;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CouponRequest;
use App\Tag;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CouponsController extends Controller
{
    public function index()
    {
        $coupons = Coupon::sortable()
            ->orderBy('id', 'desc')
            ->paginate(5);

        return view('admin.coupons')->with([
            'coupons' => $coupons,
        ]);
    }

    public function create()
    {
        return view('admin.coupon_create');
    }

    public function store(CouponRequest $request)
    {
        DB::beginTransaction();
        try {
            $coupon = new Coupon();
            $coupon->user_id = $request->input('user_id');
            $coupon->coupon_name = $request->input('coupon_name');
            $coupon->coupon_content = $request->input('coupon_content');
            $coupon->target = $request->input('target');
            $coupon->release_status = $request->input('release_status');
            $coupon->save();
            $message = 'クーポンの作成に成功しました。';
        } catch(\Exception $e){
            report($e);
            $message = 'クーポンの作成に失敗しました。';
        }
        DB::commit();

        return redirect(route('admin.coupons.top'))->with([
            'message' => $message,
        ]);
    }

    public function edit($id)
    {
        $coupon = Coupon::where('id',$id)
            ->firstOrFail();

        return view('admin.coupon_edit')->with([
            'coupon' => $coupon,
        ]);
    }

    public function update(CouponRequest $request)
    {
        DB::beginTransaction();
        try {
            $coupon = Coupon::where('id',$request->id)->first();
            $coupon->user_id = $request->input('user_id');
            $coupon->coupon_name = $request->input('coupon_name');
            $coupon->coupon_content = $request->input('coupon_content');
            $coupon->target = $request->input('target');
            $coupon->release_status = $request->input('release_status');
            $coupon->save();
            $message = 'クーポンの編集に成功しました。';
        } catch(\Exception $e){
            report($e);
            $message = 'クーポンの編集に失敗しました。';
        }
        DB::commit();

        return redirect(route('admin.coupons.top'))->with([
            'message' => $message,
        ]);
    }


    public function delete(Request $request)
    {
        DB::beginTransaction();
        try {
            $coupon = Coupon::where('id',$request->id)->first();
            $coupon->delete();
            $message = 'クーポンの削除に成功しました。';
        } catch(\Exception $e){
            report($e);
            $message = 'クーポンの削除に失敗しました。';
        }
        DB::commit();

        return redirect(route('admin.coupons.top'))->with([
            'message' => $message,
        ]);
    }
}
