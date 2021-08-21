@extends('layouts.app')

@section('title','お知らせ')


@section('css')
<link rel="stylesheet" href="{{ asset('css/Member/information.css') }}">
@endsection

@section('content')

<div class="main-content container">

    <div class="theme">
        <h1 class="text-center">お知らせ詳細</h1>
    </div>

    <div class="card text-center border-dark">
        <div class="card-header">
            {{ $information->subject }}
        </div>
        <div class="card-body text-dark">
            <p class="card-text">{{ $information->content }}</p>
        </div>
        <div class="card-footer text-muted">
            {{ $information->created_at->format('Y/m/d') }}
        </div>
    </div>

    <div class="button-group text-center">
        <a class="return-button" href="{{ route('member.top') }}" role="button">戻る</a>
    </div>

</div>

@endsection