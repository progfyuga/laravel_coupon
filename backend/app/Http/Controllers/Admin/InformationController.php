<?php

namespace App\Http\Controllers\Admin;

use App\Course;
use App\Http\Controllers\Controller;
use App\Http\Requests\InformationRequest;
use App\Information;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use DB;

class InformationController extends Controller
{
    public function index(){

        $information = Information::sortable()
            ->orderBy('id', 'desc')
            ->paginate(5);

        return view('admin.information', ['information' => $information]);
    }

    public function create(){
        $courses = Course::get();
        return view('admin.information_create',['courses' => $courses]);
    }

    public function store(InformationRequest $request){

        DB::beginTransaction();
        try {
            $information = new Information;

            $information->subject = $request->input('subject');
            $information->content = $request->input('content');
            $information->info_to = $request->input('info_to');
            $information->save();
            DB::commit();
            $message = 'インフォメーションを投稿しました。';
        } catch (\Exception $e) {
            $message = 'インフォメーションの投稿に失敗しました。';
            DB::rollback();
        }

        return redirect(route('admin.information.create'))->with('message',$message);
    }

    public function edit($info_id){
        $information = Information::where('id', $info_id)
            ->firstOrFail();

        return view('admin.information_edit',['information' => $information]);
    }

    public function update(InformationRequest $request){

        DB::beginTransaction();
        try {
            $information = Information::find($request->id);

            $information->subject = $request->input('subject');
            $information->content = $request->input('content');
            $information->info_to = $request->input('info_to');
            $information->save();
            DB::commit();
            $message = 'インフォメーションを編集しました。';
        } catch (\Exception $e) {
            DB::rollback();
            $message = 'インフォメーションの投稿に失敗しました。';
        }

        return redirect(route('admin.information.edit',$request->id))->with('message',$message);
    }

    public function destroy(Request $request){

        DB::beginTransaction();
        try {
            Information::destroy($request->id);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
        }

        return redirect(route('admin.information.top'));

    }

}
