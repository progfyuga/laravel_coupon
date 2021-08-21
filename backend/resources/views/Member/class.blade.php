@extends('layouts.app')

@section('title','クラスページ')

@section('css')
<link rel="stylesheet" href="{{ asset('css/Member/class.css') }}">
@endsection

@section('content')
<div class="container main-content">

    <div class="theme">
        <h1 class="text-center">{{$user_class->class_name}}のクラスのお部屋</h1>
    </div>

    <div class="container message-group">
        @foreach ($class_messages as $class_message)
        <div class="balloon_r">
            <div class="faceicon">
                <img src="{{ asset('/images/teacher.png') }}" alt="">
            </div>
            <div class="says">
                <p>{{$class_message->content}}</p>
            </div>
        </div>
        @endforeach
        {{ $class_messages->links('vendor.pagination.original') }}
    </div>
    <div class="button-group text-center">
        <a class="return-button" href="{{ route('member.top') }}" role="button">戻る</a>
    </div>

</div>

@endsection