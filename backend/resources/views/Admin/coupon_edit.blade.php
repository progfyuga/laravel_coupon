@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')


    <div class="card">
        <div class="card-header">
            <h3 class="card-title">クーポン編集</h3>
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
            <form method="POST" action="{{ route('admin.coupons.update') }}">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <input name="id" hidden value="{{$coupon->id}}">
                        <label for="user_id">ユーザーID</label>
                        <input type="text" name="user_id" class="form-control" placeholder="ユーザーID" value="{{ old('user_id') ?: $coupon->user_id}}">
                        <label for="coupon_name">クーポン名</label>
                        <input type="text" name="coupon_name" class="form-control" placeholder="クーポン名" value="{{ old('coupon_name') ?: $coupon->coupon_name }}">
                        <label for="coupon_content">クーポン内容</label>
                        <textarea name="coupon_content" placeholder="クーポンの内容" class="form-control" cols="auto" rows="10">{{ old('coupon_content') ?: $coupon->coupon_content }}</textarea>
                        <label for="target">対象者</label>
                        <input type="text" name="target" class="form-control" placeholder="対象者の説明" value="{{ old('target') ?: $coupon->target }}">
                        <label for="target">タグ設定</label>
                        <br>
                        @foreach($tags as $tag)
                            <div class="form-check form-check-inline ">
                                <input class="form-check-input" type="checkbox" name="tags[]"  value="{{$tag->id}}" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    {{ $tag->name }}
                                </label>
                            </div>
                        @endforeach
                        <br>
                        <label for="target">公開状態</label>
                        <select name="release_status" class="form-control">
                            <option value="1" @if($coupon->release_status) selected @endif >公開</option>
                            <option value="0" @if(!$coupon->release_status) selected @endif >非公開</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-info mt-3">投稿</button>
                <a href="{{ route('admin.coupons.top') }}" class="btn btn-secondary mt-3">戻る</a>
            </form>
        </div>
    </div>
        <!-- /.card-body -->

        @stop

        @section('css')
            <link rel="stylesheet" href="/css/admin_custom.css">
        @stop

        @section('js')
            <script>
                console.log('Hi!');
            </script>
@stop
