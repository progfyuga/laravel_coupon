@extends('layouts.app')

@section('title','マイページ')

@section('css')
<link rel="stylesheet" href="{{ asset('css/member/user.css') }}">
@endsection

@section('content')
<div class="container main-content">
    <div class="theme">
        <h1 class="text-center">マイページ</h1>
    </div>

    <div class="card" style="width: 100%">
        <div class="card-header">
            {{ $user->name }}
        </div>
        <div class="card-body">
            <h5 class="card-title">詳細</h5>
            <p class="card-text">{{ $user->content }}</p>
            <h5 class="card-title">住所</h5>
            <p class="card-text">{{ $user->prefecture->name }}{{ $user->address }}</p>
            <h5 class="card-title">メールアドレス</h5>
            <p class="card-text">{{ $user->email }}</p>
            <h5 class="card-title">電話番号</h5>
            <p class="card-text">{{ $user->tel_no }}</p>
            <h5 class="card-title">緯度</h5>
            <p class="card-text">{{ $user->lat }}</p>
            <h5 class="card-title">経度</h5>
            <p class="card-text">{{ $user->lng }}</p>
            <h5 class="card-title">マップ公開状態</h5>
            <p class="card-text">{{ $user->map_status ? '公開中' : '非公開'}}</p>
        </div>
    </div>

    <div class="button-group text-center">
        <a class="edit-button" href="{{ route('member.user.edit') }}" role="button">編集する</a>
        <a class="return-button" href="{{ route('member.top') }}" role="button">戻る</a>
    </div>
</div>
@endsection
