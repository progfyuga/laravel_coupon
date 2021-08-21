<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Information;

class MemberController extends Controller
{
    public function index()
    {
        $information = Information::orderBy('created_at', 'desc')
            ->paginate(8);

        return view('Member.top', ['information' => $information]);
    }
}
