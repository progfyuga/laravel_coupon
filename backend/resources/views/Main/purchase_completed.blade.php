@extends('layouts.main')

@section('title','販売促進')

@section('css')
@endsection

@section('content')
    <div class="mt-5">
        <h1>購入完了です！！！</h1>
        <h1>メール送りました！</h1>

        <a href="{{ route('main.top') }}">戻る</a>
    </div>
@endsection
