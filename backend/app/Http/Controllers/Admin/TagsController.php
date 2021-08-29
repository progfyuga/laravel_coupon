<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Tag;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    public function index()
    {
        $tags = Tag::sortable()
            ->orderBy('id', 'desc')
            ->paginate(5);

        return view('admin.tags')->with([
            'tags' => $tags,
        ]);
    }

    public function create()
    {
        return view('admin.tag_create');
    }

    public function store(Request $request)
    {
        try {
            $tag = new Tag();
            $tag->name = $request->input('name');
            $tag->save();
            $message = 'タグの作成に成功しました。';
        } catch(\Exception $e){
            report($e);
            $message = 'タグの作成に失敗しました。';
        }

        return redirect(route('admin.tags.create'))->with([
            'message' => $message,
        ]);
    }

    public function edit(Request $request)
    {
        try {
            $tag = Tag::where('id',$request->id)->first();
            $tag->name = $request->input('name');
            $tag->save();
            $message = 'タグの編集に成功しました。';
        } catch(\Exception $e){
            report($e);
            $message = 'タグの編集に失敗しました。';
        }

        return redirect(route('admin.tags.top'))->with([
            'message' => $message,
        ]);
    }

    public function delete(Request $request)
    {
        try {
            $tag = Tag::where('id',$request->id)->firstOrFail();
            $tag->delete();
            $message = 'タグの削除に成功しました。';
        } catch(\Exception $e){
            report($e);
            $message = 'タグの削除に失敗しました。';
        }

        return redirect(route('admin.tags.top'))->with([
            'message' => $message,
        ]);
    }
}
