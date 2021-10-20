@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')


<div class="card">
    <div class="card-header">
        <h3 class="card-title">タグ新規作成</h3>
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
        <form method="POST" action="{{ route('admin.tags.store') }}">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="">タグ名</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="タグ名" value="{{ old('name') }}">
                </div>
            </div>
            <button type="submit" href="" class="btn btn-info mt-3">投稿</button>
            <a href="{{ route('admin.tags.top') }}" class="btn btn-secondary mt-3">戻る</a>
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
