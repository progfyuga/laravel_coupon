@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')


    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ $course->class_name }}クラスの生徒達</h3>
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
                    <th style="width: 10em">生徒の名前</th>
                    <th style="width: 10em">email</th>
                    <th style="width: 10em">電話番号</th>
                    <th style="width: 10em">登録日時</th>
                    <th colspan="2" style="width: 5em">操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach( $class_users as $user )
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->student_lastname }} {{ $user->student_firstname }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->tel_no }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td><a href="{{ route('admin.users.detail',$user->id) }}" class="btn btn-primary btn-xs">詳細</a></td>
                        <td>
                            <button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#Modal{{ $user->id }}">退会</button>
                        </td>
                    </tr>
                    <!-- クラス退会Modal -->
                    <div class="modal fade" id="Modal{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="ModalLabel">退会確認</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    {{ $user->student_lastname }} {{ $user->student_firstname }}様を退会させますか？
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">いいえ</button>
                                    <form method="POST" action="{{route('admin.class.withdrawal')}}">
                                        @csrf
                                        <input hidden name="user_id" type="text" value="{{$user->id}}">
                                        <input hidden name="course_id" type="text" value="{{$class_id}}">
                                        <button type="submit" class="btn btn-danger">退会</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->

        @stop

        @section('css')
            <link rel="stylesheet" href="/css/admin_custom.css">
        @stop

        @section('js')
            <script> console.log('Hi!'); </script>
@stop
