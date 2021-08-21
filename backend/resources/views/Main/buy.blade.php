@extends('layouts.main')

@section('title','申し込み')

@section('css')
@endsection

@section('content')
<div class="mt-5">
    <h1>申し込みページ stripe実装予定</h1>
    <a href="{{ route('main.purchase_completed') }}">購入確定</a>
    <a href="{{ route('main.top') }}">戻る</a>
</div>
@endsection
