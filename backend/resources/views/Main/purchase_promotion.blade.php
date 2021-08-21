@extends('layouts.main')

@section('title','販売促進')

@section('css')
@endsection

@section('content')
    <div>
        <h1>販売促進ページ</h1>
        <a href="{{ route('main.buy') }}">購入する</a>
        <a href="{{ route('main.top') }}">戻る</a>
    </div>
@endsection
