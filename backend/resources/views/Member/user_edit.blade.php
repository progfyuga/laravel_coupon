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
                <form method="POST" action="{{ route('member.user.update') }}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <input name="id" hidden value="{{$user->id}}">
                            <label for="name">店舗名</label>
                            <input type="text" name="name" class="form-control" placeholder="店舗名" value="{{ old('name') ?: $user->name }}">
                            <label for="content">店舗の詳細</label>
                            <textarea name="content" placeholder="店舗の詳細" class="form-control" cols="auto" rows="10">{{ old('content') ?: $user->content }}</textarea>
                            <label for="prefecture_id">都道府県</label>
                            <select name="prefecture_id" class="form-control">
                                @foreach($prefectures as $prefecture)
                                    <option value="{{ $prefecture->id }}" @if($prefecture->id == $user->prefecture_id) selected @endif >{{ $prefecture->name }}</option>
                                @endforeach
                            </select>
                            <label for="address">住所</label>
                            <input type="text" name="address" class="form-control" placeholder="住所" value="{{ old('address') ?: $user->address }}">
                            <label for="email">メールアドレス</label>
                            <input type="text" name="email" class="form-control" placeholder="メールアドレス" value="{{ old('email') ?: $user->email }}">
                            <label for="tel_no">電話番号</label>
                            <input type="text" name="tel_no" class="form-control" placeholder="電話番号" value="{{ old('tel_no') ?: $user->tel_no }}">
                            <h5 class="card-title">緯度</h5>
                            <p class="card-text">{{ $user->lat }}</p>
                            <h5 class="card-title">経度</h5>
                            <p class="card-text">{{ $user->lng }}</p>
                            <label for="target">マップ公開状態</label>
                            <select name="map_status" class="form-control">
                                <option value="1" @if($user->map_status) selected @endif >公開</option>
                                <option value="0" @if(!$user->map_status) selected @endif >非公開</option>
                            </select>
                            <p>※緯度経度が未入力の場合、非公開に設定されます。</p>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-info mt-3">保存</button>
                    <a href="{{ route('member.user.index') }}" class="btn btn-secondary mt-3">戻る</a>
                </form>
            </div>
        </div>
    </div>
@endsection
