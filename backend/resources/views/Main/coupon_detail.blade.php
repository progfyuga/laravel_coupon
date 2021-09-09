@extends('layouts.main')

@section('title','トップ')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/Parts/learning_system.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Parts/teacher_introduce.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Parts/fee.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Parts/questions.css') }}">
@endsection

@section('content')
    <div style="margin: 100px 2em">
        <div class="card">
            <div class="card-header">
                {{ $coupon->coupon_name }}
            </div>
            <div class="card-body">
                <h5 class="card-title">内容</h5>
                <p class="card-text">{{ $coupon->coupon_content }}</p>
                <h5 class="card-title">対象者</h5>
                <p class="card-text">{{ $coupon->target }}</p>
                <h5 class="card-title">店舗名</h5>
                <p class="card-text">{{ $coupon->user->name }}</p>
                <h5 class="card-title">クーポンID</h5>
                <p class="card-text">{{ $coupon->id }}</p>
                <button class="btn btn-info">この画面を店員にお見せください。</button>
            </div>
        </div>
    </div>
@endsection
