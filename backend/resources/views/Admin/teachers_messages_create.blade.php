@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')


    <div class="card">
        <div class="card-header">
            <h3 class="card-title">講師メッセージ新規投稿</h3>
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
            <form method="POST" action="{{ route('admin.teachers_messages.store') }}">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="">タイトル</label>
                        <input type="text" name="subject" class="form-control" id="subject" placeholder="タイトル" value="{{ old('subject') }}">
                    </div>
                    <div class="form-group">
                        <label for="">内容</label>
                        <textarea name="content" class="form-control" id="content" cols="30" rows="10" placeholder="内容">{{ old('content') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>提示クラス</label>
                        <select name="class_to" class="form-control">
                            @foreach($courses as $course)
                                <option value="{{$course->id}}">{{$course->class_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <button type="submit" href="" class="btn btn-info mt-3">投稿</button>
                <a href="{{ route('admin.teachers_messages.top') }}" class="btn btn-secondary mt-3">戻る</a>
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
