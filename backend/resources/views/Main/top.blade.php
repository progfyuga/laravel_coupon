@extends('layouts.main')

@section('title','トップ')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/Parts/learning_system.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Parts/teacher_introduce.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Parts/fee.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Parts/questions.css') }}">
@endsection

@section('content')
    <div class="main-wrapper">
        <div class="top-wrapper">
            <div class="top-image">
                <div class="top-subjects">
                    <div class="top-title">
                        <p>お家<br>DE学習</p>
                    </div>
                    <div class="top-sub">
                        <p>短期集中でプログラミング能を作りませんか?</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="main-content">
            @include('Parts.learning_system')
        </div>
        <div class="main-content">
            @include('Parts.description')
        </div>
        <div class="main-content">
            @include('Parts.teacher_introduction')
        </div>
        <div class="main-content">
            @include('Parts.fee')
        </div>
        <div class="main-content">
            @include('Parts.questions')
        </div>

    </div>
@endsection
