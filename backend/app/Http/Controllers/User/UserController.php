<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\User;
use App\Course;
use App\UsersCourse;
use App\Http\Requests\UserUpdateRequest;
use DB;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        try {
            $user_course = UsersCourse::where('user_id', Auth::id())->firstOrFail();

            $user_class = Course::where('course', 1)->where('id', $user_course->course_id)->firstOrFail();

            $user_class = $user_class->class_name;
        } catch (\Exception $e) {
            $user_class = "未配属";
        }

        return view('Member.user', ['user' => $user, 'user_class' => $user_class]);
    }
    public function edit()
    {
        $user = Auth::user();

        return view('Member.edit', ['user' => $user]);
    }
    public function update(UserUpdateRequest $request)
    {
        DB::beginTransaction();
        try {
            $user = Auth::user();
            $user->student_lastname = $request->input('student_lastname');
            $user->student_lastname_kana = $request->input('student_lastname_kana');
            $user->student_firstname = $request->input('student_firstname');
            $user->student_firstname_kana = $request->input('student_firstname_kana');
            $user->email = $request->input('email');
            $user->address = $request->input('address');
            $user->tel_no = $request->input('tel_no');
            $user->parent_lastname = $request->input('parent_lastname');
            $user->parent_lastname_kana = $request->input('parent_lastname_kana');
            $user->parent_firstname = $request->input('parent_firstname');
            $user->parent_firstname_kana = $request->input('parent_firstname_kana');
            $user->save();
            DB::commit();
            $message = '更新完了';
        } catch (\Exception $e) {
            $message = '更新に失敗しました';
            DB::rollback();
        }

        return redirect(route('member.edit', ['user' => $user]))->with('message', $message);
    }
}
