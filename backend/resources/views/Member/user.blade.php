@extends('layouts.app')

@section('title','マイページ')

@section('css')
<link rel="stylesheet" href="{{ asset('css/Member/user.css') }}">
@endsection

@section('content')
<div class="container main-content">
    <div class="theme">
        <h1 class="text-center">マイページ</h1>
    </div>

    <div class="card mx-auto border-dark">
        <div class="card-header">
            あなたの情報
        </div>
        <ul class="list-group list-group-flush text-center">
            <li class="list-group-item"><i class="fas fa-child fa-fw"></i> {{$user->student_lastname}} {{$user->student_firstname}}</li>
            <li class="list-group-item"><i class="fas fa-school fa-fw"></i> あなたのクラスは {{$user_class}} です</li>
            <li class="list-group-item"><i class="fas fa-envelope fa-fw"></i> {{$user->email}}</li>
            <li class="list-group-item"><i class="fas fa-map-marker-alt fa-fw"></i> {{$user->address}}</li>
            <li class="list-group-item"><i class="fas fa-phone fa-fw"></i> {{$user->tel_no}}</li>
            <li class="list-group-item"><i class="fas fa-user fa-fw"></i> {{$user->parent_lastname}} {{$user->parent_firstname}}</li>
        </ul>
    </div>

    <div class="button-group text-center">
        <a class="edit-button" href="{{ route('member.edit') }}" role="button">編集する</a>
        <a class="return-button" href="{{ route('member.top') }}" role="button">戻る</a>
    </div>
</div>
@endsection