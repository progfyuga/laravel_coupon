<?php

namespace App\Http\Controllers\Admin;

use App\Course;
use App\Http\Controllers\Controller;
use App\User;
use App\UsersCourse;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    public function index(){

        $users = User::sortable()
            ->orderBy('id', 'desc')
            ->paginate(5);

        return view('admin.users',['users' => $users]);

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

    public function add_class($user_id){

        $course_id = UsersCourse::where('user_id',$user_id)
            ->select('course_id')
            ->get();


        $classes = Course::sortable()
            ->whereNotIn('id', $course_id)
            ->orWhereNull('id')
            ->orderBy('id', 'desc')
            ->paginate(5);


        return view('admin.add_class',[
            'classes' => $classes,
            'user_id' => $user_id,
        ]);
    }

    public function add_class_store(Request $request){

        DB::beginTransaction();
        try {
            $users_courses = new UsersCourse();

            $users_courses->user_id = $request->input('user_id');
            $users_courses->course_id = $request->input('course_id');

            $users_courses->save();
            DB::commit();
            $message = 'クラスに所属させました。';
        } catch (\Exception $e){
            DB::rollback();
            $message = 'クラスの所属に失敗しました。';
        }

        return redirect(route('admin.users.detail',$users_courses->user_id))->with('message',$message);
    }

}
