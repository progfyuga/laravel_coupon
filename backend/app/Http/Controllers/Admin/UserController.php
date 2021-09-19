<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRequest;
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

    public function detail($user_id){
        $user = User::where('id',$user_id)
            ->firstOrFail();

        $user_courses = UsersCourse::where('user_id',$user_id)
            ->with('course')
            ->get();

        return view('admin.user_detail',[
            'user' => $user,
            'user_courses' => $user_courses,
        ]);
    }

}
