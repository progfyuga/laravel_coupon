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
                    <th style="width: 5em">編集</th>
                    <th style="width: 5em">削除</th>
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
                        <td><a href="{{ route('admin.users.edit',$user->id) }}" class="btn btn-info btn-xs">編集</a></td>
                        <td><button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#Modal{{ $user->id }}">削除</button></td>
                    </tr>

                    <!-- 削除Modal -->
                    <div class="modal fade" id="Modal{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="ModalLabel">削除確認</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    {{ $user->name }}を削除しますか？
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">いいえ</button>
                                    <form method="POST" action="{{route('admin.users.delete')}}">
                                        @csrf
                                        <input hidden name="id" type="text" value="{{$user->id}}">
                                        <button type="submit" class="btn btn-danger">削除</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

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
