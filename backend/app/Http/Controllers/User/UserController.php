<?php

namespace App\Http\Controllers\User;


use App\Http\Requests\UserUpdateRequest;
use App\Prefecture;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return view('member.user', [
            'user' => $user
        ]);
    }

    public function edit()
    {
        $user = Auth::user();
        $prefectures = Prefecture::get();

        $pack = [
            'user' => $user,
            'prefectures' => $prefectures,
        ];

        return view('member.user_edit',$pack);
    }

    public function update(UserUpdateRequest $request)
    {
        DB::beginTransaction();
        try {
            $user = Auth::user();
            $user->name = $request->input('name');
            $user->content = $request->input('content');
            $user->prefecture_id = $request->input('prefecture_id');
            $user->address = $request->input('address');
            $user->email = $request->input('email');
            $user->tel_no = $request->input('tel_no');
            $user->lat = $request->input('lat','');
            $user->lng = $request->input('lng','');
            if(is_null($request->lat) || is_null($request->lng)){
                $user->map_status = 0;
            }else{
                $user->map_status = $request->input('map_status');
            }
            $user->save();
            DB::commit();
            $message = '店舗情報の編集に成功しました。';
        } catch (\Exception $e) {
            report($e);
            $message = '店舗情報の編集に失敗しました';
            DB::rollback();
        }

        return redirect()->back()->with('message', $message);
    }
}
