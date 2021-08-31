@extends('layouts.app')

@section('title','メンバーページ')

@section('css')
<link rel="stylesheet" href="{{ asset('css/Member/top.css') }}">
@endsection

@section('content')
<div class="container main-content">

    <div class="theme">
        <h1 class="text-center">ようこそ、{{Auth::user()->name}}さん！</h1>
    </div>



    <div class="class-group text-center">
        <a class="class-button" href="{{ route('member.class') }}" role="button">受講する</a>
    </div>

</div>
@endsection
