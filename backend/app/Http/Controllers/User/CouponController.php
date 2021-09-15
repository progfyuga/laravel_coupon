<?php

namespace App\Http\Controllers\User;

use App\Coupon;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CouponController extends Controller
{
    public function create()
    {
        return view('member.coupon_create');
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $coupon = new Coupon();
            $coupon->user_id = Auth::id();
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

        return redirect(route('member.top'))->with([
            'message' => $message,
        ]);
    }

    public function edit($id)
    {
        $coupon = Coupon::where('id',$id)
            ->firstOrFail();

        return view('member.coupon_edit')->with([
            'coupon' => $coupon,
        ]);
    }

    public function update(Request $request)
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

        return redirect(route('member.top'))->with([
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

        return redirect(route('member.top'))->with([
            'message' => $message,
        ]);
    }
}
