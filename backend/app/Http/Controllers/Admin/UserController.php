<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Prefecture;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){

        $users = User::sortable()
            ->orderBy('id', 'desc')
            ->paginate(5);

        return view('admin.users',[
            'users' => $users
        ]);

    }

    public function create(){

        $prefectures = Prefecture::get();

        return view('admin.user_create',[
            'prefectures' => $prefectures,
        ]);
    }

    public function store(UserRequest $request){

        DB::beginTransaction();
        try {
            $user = new User();
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
            $user->password = Hash::make($request->input('password'));
            $user->save();
            DB::commit();
            $message = '店舗の作成に成功しました。';
        } catch (\Exception $e) {
            report($e);
            $message = '店舗の作成に失敗しました';
            DB::rollback();
        }

        return redirect(route('admin.users.top'))->with('message', $message);
    }

    public function delete(Request $request)
    {
        DB::beginTransaction();
        try {
            $tag = User::where('id',$request->id)->first();
            $tag->delete();
            $message = '店舗の削除に成功しました。';
        } catch(\Exception $e){
            report($e);
            $message = '店舗の削除に失敗しました。';
        }
        DB::commit();

        return redirect(route('admin.users.top'))->with('message', $message);
    }

    public function edit($id){

        $user = User::where('id',$id)
            ->firstOrFail();

        $prefectures = Prefecture::get();

        return view('admin.user_edit',[
            'user' => $user,
            'prefectures' => $prefectures,
        ]);
    }

    public function update(UserUpdateRequest $request){

        DB::beginTransaction();
        try {
            $user = User::where('id',$request->id)
                ->first();
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

        return redirect(route('admin.users.top'))->with('message', $message);
    }

}
