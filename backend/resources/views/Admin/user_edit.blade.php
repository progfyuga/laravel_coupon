@extends('adminlte::page')

@section('title', '店舗編集')

@section('content_header')

@stop

@section('content')


    <div class="card">
        <div class="card-header">
            <h3 class="card-title">店舗編集</h3>
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
            <form method="POST" action="{{ route('admin.users.update') }}">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <input name="id" hidden value="{{$user->id}}">
                        <label for="name">店舗名</label>
                        <input type="text" name="name" class="form-control" placeholder="店舗名" value="{{ old('name') ?: $user->name }}">
                        <label for="content">店舗の詳細</label>
                        <textarea name="content" placeholder="店舗の詳細" class="form-control" cols="auto" rows="10">{{ old('content') ?: $user->content }}</textarea>
                        <label for="prefecture_id">都道府県</label>
                        <select id="prefecture" name="prefecture_id" class="form-control">
                            @foreach($prefectures as $prefecture)
                                <option value="{{ $prefecture->id }}" @if($prefecture->id == $user->prefecture_id) selected @endif >{{ $prefecture->name }}</option>
                            @endforeach
                        </select>
                        <label for="address">住所</label>
                        <input id="address" type="text" name="address" class="form-control" placeholder="住所" value="{{ old('address') ?: $user->address }}">
                        <a href="javascript:searchLatLng();">住所で緯度軽度を検索</a>
                        <div id="map"></div>
                        <script src="{{ asset('js/map.js') }}"></script>
                        <script>
                            var markerData = '';
                            var key_word = '';
                        </script>
                        <script src="https://maps.googleapis.com/maps/api/js?key={{ config('api_key.google_map') }}&callback=initMap"></script>
                        <style>
                            #map {
                                width: 100%;
                                height: 300px;
                            }
                        </style>
                        <label for="lat">緯度</label>
                        <input readonly id="lat" type="text" name="lat" class="form-control" placeholder="緯度" value="{{ old('lat') ?: $user->lat }}">
                        <label for="lng">経度</label>
                        <input readonly id="lng" type="text" name="lng" class="form-control" placeholder="経度" value="{{ old('lng') ?: $user->lng }}">
                        <label for="email">メールアドレス</label>
                        <input type="text" name="email" class="form-control" placeholder="メールアドレス" value="{{ old('email') ?: $user->email }}">
                        <label for="tel_no">電話番号</label>
                        <input type="text" name="tel_no" class="form-control" placeholder="電話番号" value="{{ old('tel_no') ?: $user->tel_no }}">
                        <label for="target">マップ公開状態</label>
                        <select name="map_status" class="form-control">
                            <option value="1" @if($user->map_status) selected @endif >公開</option>
                            <option value="0" @if(!$user->map_status) selected @endif >非公開</option>
                        </select>
                        <p>※緯度経度が未入力の場合、非公開に設定されます。</p>

                        {{--ログインパスワード--}}
                        <label for="password" class="">ログインパスワード</label>
                        <input id="password" type="password" class="form-control" placeholder="パスワード" name="password">

                        {{--ログインパスワード確認--}}
                        <label for="password_confirmation" class="">ログインパスワード確認</label>
                        <input id="password_confirmation" type="password" placeholder="パスワード確認用" class="form-control" name="password_confirmation" >

                    </div>
                </div>
                <button type="submit" class="btn btn-info mt-3">保存</button>
                <a href="{{ route('admin.users.top') }}" class="btn btn-secondary mt-3">戻る</a>
            </form>
        </div>
        <!-- /.card-body -->

    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
