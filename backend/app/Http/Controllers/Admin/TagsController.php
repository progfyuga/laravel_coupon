<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Tag;
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
}
