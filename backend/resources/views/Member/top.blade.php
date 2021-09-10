@extends('layouts.app')

@section('title','メンバーページ')

@section('css')
<link rel="stylesheet" href="{{ asset('css/Member/top.css') }}">
@endsection

@section('content')
<div class="container main-content">
    <div style="margin:2em">
        <h2>店舗情報</h2>
        <div class="card">
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
            </div>
        </div>
    </div>

    <div class="row" style="margin:2em">
        <h2>発行クーポン一覧</h2>
        @foreach($coupons as $coupon)
            <div class="col-12 col-md-4">
                <div class="card">
                    <div class="card-header">
                        {{ $coupon->coupon_name }}
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">クーポン内容</h5>
                        <p class="card-text">{{ $coupon->coupon_content }}</p>
                        <h5 class="card-title">対象者</h5>
                        <p class="card-text">{{ $coupon->target }}</p>
                        <a href="{{ route('main.coupon_detail',$coupon->id) }}" class="btn btn-info">このクーポンを使う</a>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="mt-3">
            <a href="{{ route('admin.coupons.create') }}" class="btn btn-primary">新規作成</a>
            <div style="float:right">{{$coupons->appends(request()->input())->links()}}</div>
        </div>
    </div>
</div>
@endsection
