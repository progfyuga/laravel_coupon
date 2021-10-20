@extends('layouts.app')

@section('title','クーポン作成')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/member/top.css') }}">
@endsection

@section('content')
    <div class="container main-content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">クーポン新規作成</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
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
                <form method="POST" action="{{ route('member.coupon.store') }}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="coupon_name">クーポン名</label>
                            <input type="text" name="coupon_name" class="form-control" placeholder="クーポン名" value="{{ old('coupon_name') }}">
                            <label for="coupon_content">クーポン内容</label>
                            <textarea name="coupon_content" placeholder="クーポンの内容" class="form-control" cols="auto" rows="10">{{ old('coupon_content') }}</textarea>
                            <label for="target">対象者</label>
                            <input type="text" name="target" class="form-control" placeholder="対象者の説明" value="{{ old('target') }}">
                            <label for="target">公開状態</label>
                            <select name="release_status" class="form-control">
                                <option value="1" >公開</option>
                                <option value="0" >非公開</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-info mt-3">投稿</button>
                    <a href="{{ route('member.top') }}" class="btn btn-secondary mt-3">戻る</a>
                </form>
            </div>
        </div>
    </div>
@endsection
