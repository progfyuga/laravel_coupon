<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Information;

class MemberController extends Controller
{
    public function index()
    {
        return view('Member.top');
    }
}
