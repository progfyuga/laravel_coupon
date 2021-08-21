@extends('layouts.app')

@section('title','メンバーページ')

@section('css')
<link rel="stylesheet" href="{{ asset('css/Member/top.css') }}">
@endsection

@section('content')
<div class="container main-content">

    <div class="theme">
        <h1 class="text-center">ようこそ、{{Auth::user()->student_firstname}}さん！</h1>
    </div>


    <div class="info-group">
        <div class="info-list">
            <ul>
                @foreach ($information as $info)
                <li><a href="{{ url('/member/information', $info->id) }}" class="">[{{ $info->created_at->format('Y/m/d') }}] {{ $info->subject }}</a></li>
                @endforeach
            </ul>
        </div>
        {{ $information->links('vendor.pagination.original') }}
    </div>


    <div class="class-group text-center">
        <a class="class-button" href="{{ route('member.class') }}" role="button">受講する</a>
    </div>

    <div class="class-group text-center">
        <a class="class-button" href="mailto:info&#64;example.com?subject=授業に関しての質問&amp;body={{Auth::user()->student_lastname}}%20{{Auth::user()->student_firstname}}さんからの質問です。%0d%0a以下に質問内容をご記入ください。" role="button">質問する</a>
    </div>

</div>
@endsection