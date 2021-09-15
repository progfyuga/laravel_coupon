@extends('layouts.app')

@section('title','メンバーページ')

@section('css')
<link rel="stylesheet" href="{{ asset('css/member/top.css') }}">
@endsection

@section('content')
<div class="container main-content">
    <div style="margin:2em">
        @if(count($errors) > 0)
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
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
                <div class="card mb-5">
                    <div class="card-header">
                        {{ $coupon->coupon_name }}
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">クーポン内容</h5>
                        <p class="card-text">{{ $coupon->coupon_content }}</p>
                        <h5 class="card-title">対象者</h5>
                        <p class="card-text">{{ $coupon->target }}</p>
                        <a href="{{ route('member.coupon.edit',$coupon->id) }}" class="btn btn-info">編集</a>
                        <button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#Modal{{$coupon->id}}">削除</button>
                    </div>
                </div>
            </div>

            <!-- 削除Modal -->
            <div class="modal fade" id="Modal{{$coupon->id}}" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="ModalLabel">削除確認</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            {{ $coupon->coupon_name }}を削除しますか？
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">いいえ</button>
                            <form method="POST" action="{{route('member.coupon.delete')}}">
                                @csrf
                                <input hidden name="id" type="text" value="{{$coupon->id}}">
                                <button type="submit" class="btn btn-danger">削除</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="mt-3">
            <a href="{{ route('member.coupon.create') }}" class="btn btn-primary">新規作成</a>
            <div style="float:right">{{$coupons->appends(request()->input())->links()}}</div>
        </div>
    </div>
</div>
@endsection
