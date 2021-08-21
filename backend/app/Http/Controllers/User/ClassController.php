<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\UsersCourse;
use App\Course;
use App\TeachersMessage;
use Auth;

class ClassController extends Controller
{
    public function index()
    {
        try {
            $user_course = UsersCourse::where('user_id', Auth::id())->firstOrFail();

            $user_class = Course::where('course', 1) //TODO:コースが増えた時には受け取った値を入れる
                ->where('id', $user_course->course_id)
                ->firstOrFail();
        } catch (\Exception $e) {
            return view('Member.exception');
        }

        $class_messages = TeachersMessage::where('class_to', $user_class->class_id)->orderBy('created_at', 'desc')->paginate(6);

        return view('Member.class', [
            'class_messages' => $class_messages,
            'user_class' => $user_class
        ]);
    }
}
