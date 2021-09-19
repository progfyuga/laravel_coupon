@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')


    <div class="card">
        <div class="card-header">
            <h3 class="card-title">店舗管理</h3>
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
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th style="width: 5em">ID @sortablelink('id','↕︎')</th>
                    <th style="width: 10em">店舗名</th>
                    <th style="width: 10em">email</th>
                    <th style="width: 10em">電話番号</th>
                    <th style="width: 10em">登録日時</th>
                    <th style="width: 5em">詳細</th>
                </tr>
                </thead>
                <tbody>
                @foreach( $users as $user )
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->tel_no }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td><a href="{{ route('admin.users.detail',$user->id) }}" class="btn btn-primary btn-xs">詳細</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="mt-3">
                <a href="{{ route('admin.users.create') }}" class="btn btn-primary">新規作成</a>
                <div style="float:right">{{$users->appends(request()->input())->links()}}</div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>

        @stop

        @section('css')
            <link rel="stylesheet" href="/css/admin_custom.css">
        @stop

        @section('js')
            <script> console.log('Hi!'); </script>
@stop
