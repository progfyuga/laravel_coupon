@extends('layouts.app')

@section('title','エラーページ')

@section('css')
<link rel="stylesheet" href="{{ asset('css/Member/exception.css') }}">
@endsection

@section('content')
<div class="container main-content">

    <div class="theme text-center">
        <h1>クラスが未配属です。</h1>
        <p>受講開始日が近づいても未配属の場合、申し訳ありませんがお問い合わせください。</p>
    </div>
</div>
@endsection