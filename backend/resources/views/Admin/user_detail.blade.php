@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')


    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ $user->student_lastname }} {{ $user->student_firstname }}様のプロフィール</h3>
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
            <table class="row">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>生徒の名前</th>
                    <th>生徒の名前(カナ)</th>
                    <th>保護者様の名前</th>
                    <th>保護者様の名前(カナ)</th>
                    <th>email</th>
                    <th>住所</th>
                    <th>電話番号</th>
                    <th>登録日時</th>
                    <th>所属クラス</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->student_lastname }} {{ $user->student_firstname }}</td>
                        <td>{{ $user->student_lastname_kana }} {{ $user->student_firstname_kana }}</td>
                        <td>{{ $user->parent_lastname }} {{ $user->parent_firstname }}</td>
                        <td>{{ $user->parent_lastname_kana }} {{ $user->parent_firstname_kana }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->address }}</td>
                        <td>{{ $user->tel_no }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>
                            @foreach($user_courses as $user_course)
                                <a href="{{ route('admin.class.users',$user_course->course->id) }}">{{ $user_course->course->class_name }}</a><br>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <a class="btn btn-success" href="{{ route('admin.users.add_class', $user->id) }}">クラスに所属させる</a>
        </div>
        <!-- /.card-body -->
        <style>
            table.row th,
            table.row td{

                width:100%!important;

                display:block!important;

            }
        </style>

        @stop

        @section('css')
            <link rel="stylesheet" href="/css/admin_custom.css">
        @stop

        @section('js')
            <script> console.log('Hi!'); </script>
@stop
