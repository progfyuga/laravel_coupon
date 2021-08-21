<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Course;
use App\Http\Requests\ClassRequest;
use App\User;
use App\UsersCourse;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClassController extends Controller
{
    public function index(){

        $classes = Course::sortable()
            ->orderBy('id', 'desc')
            ->paginate(5);

        $users_classes = UsersCourse::get();

        return view('admin.class',[
            'classes' => $classes,
            'users_classes' => $users_classes,
        ]);

    }

    public function create(){

        return view('admin.class_create');
    }

    public function store(ClassRequest $request){

        DB::beginTransaction();
        try {
            $class = new Course;

            $class->course = $request->input('course');
            $class->class_id = $request->input('class_id');
            $class->class_name = $request->input('class_name');
            $class->save();
            DB::commit();
            $message = '新規クラスを作成しました。';
        } catch (\Exception $e) {
            $message = '新規クラスの作成に失敗しました。';
            DB::rollback();
        }

        return redirect(route('admin.class.create'))->with('message',$message);
    }

    public function edit($info_id){
        $class = Course::where('id', $info_id)
            ->firstOrFail();

        return view('admin.class_edit',['class' => $class]);
    }

    public function update(ClassRequest $request){

        DB::beginTransaction();
        try {
            $class = Course::find($request->id);

            $class->course = $request->input('course');
            $class->class_id = $request->input('class_id');
            $class->class_name = $request->input('class_name');
            $class->save();
            DB::commit();
            $message = 'クラスを編集しました。';
        } catch (\Exception $e) {
            $message = 'クラスの編集に失敗しました。';
            DB::rollback();
        }

        return redirect(route('admin.class.edit',$request->id))->with('message',$message);
    }

    public function destroy(Request $request){

        DB::beginTransaction();
        try {
            Course::destroy($request->id);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
        }

        return redirect(route('admin.class.top'));

    }

    public function users($class_id){

        try {
            //クラス取得
            $course = Course::find($class_id);

            //クラスに所属している生徒を取得
            $users_classes = UsersCourse::where('course_id',$class_id)
                ->get();
            $users_id[] = array();
            foreach ($users_classes as $users_class) {
                $users_id[] = $users_class->user_id;
            }
            $class_users = User::where('id',$users_id)->get();

        } catch (\Exception $e) {

        }

        return view('admin.class_users',[
            'class_users' => $class_users,
            'course' => $course,
            'class_id' => $class_id,
        ]);
    }

    public function withdrawal(Request $request){

        DB::beginTransaction();
        try {
            UsersCourse::where('user_id',$request->user_id)
                ->where('course_id',$request->course_id)
                ->delete();
            DB::commit();
            $message = 'クラスから退会させました。';
        } catch (\Exception $e) {
            DB::rollback();
            $message = '退会処理に失敗しました。';
        }

        return redirect(route('admin.class.users',$request->course_id))->with('message',$message);

    }

}
