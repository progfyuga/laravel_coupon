@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')


    <div class="card">
        <div class="card-header">
            <h3 class="card-title">クラス作成</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @if(count($errors) > 0)
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>z
            @endif
            @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            <form method="POST" action="{{ route('admin.class.store') }}">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="">コースID</label>
                        <input type="text" name="course" class="form-control" id="course" placeholder="コースID" value="{{ old('course') }}">
                    </div>
                    <div class="form-group">
                        <label for="">クラスID</label>
                        <input type="text" name="class_id" class="form-control" id="class_id" placeholder="クラスID" value="{{ old('class_id') }}">
                    </div>
                    <div class="form-group">
                        <label for="">クラス名</label>
                        <input type="text" name="class_name" class="form-control" id="class_name" placeholder="クラス名" value="{{ old('class_name') }}">
                    </div>
                </div>
                <button type="submit" href="" class="btn btn-info mt-3">投稿</button>
                <a href="{{ route('admin.class.top') }}" class="btn btn-secondary mt-3">戻る</a>
            </form>
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
