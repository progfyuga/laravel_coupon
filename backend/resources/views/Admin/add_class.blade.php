@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')


    <div class="card">
        <div class="card-header">
            <h3 class="card-title">クラス管理</h3>
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
                    <th>ID @sortablelink('id','↕︎')</th>
                    <th>コースID</th>
                    <th>クラスID</th>
                    <th>クラス名</th>
                    <th colspan="3">操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach( $classes as $class )
                    <tr>
                        <td>{{ $class->id }}</td>
                        <td>{{ $class->course }}</td>
                        <td>{{ $class->class_id }}</td>
                        <td>{{ $class->class_name }}</td>
                        <td>
                            <button type="button" class="btn btn-xs btn-success" data-toggle="modal" data-target="#Modal{{ $class->id }}">所属させる</button>
                        </td>
                    </tr>
                    <!-- 所属Modal -->
                    <div class="modal fade" id="Modal{{ $class->id }}" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="ModalLabel">クラス所属確認</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    {{ $class->class_name }}に所属させますか？
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">いいえ</button>
                                    <form method="POST" action="{{ route('admin.users.add_class_store') }}">
                                        @csrf
                                        <input hidden name="course_id" type="text" value="{{$class->id}}">
                                        <input hidden name="user_id" type="text" value="{{$user_id}}">
                                        <button type="submit" class="btn btn-success">所属させる</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                </tbody>
            </table>
            <div class="mt-3">
                <div style="float:right">{{$classes->appends(request()->input())->links()}}</div>
            </div>
        </div>
        <!-- /.card-body -->

        @stop

        @section('css')
            <link rel="stylesheet" href="/css/admin_custom.css">
        @stop

        @section('js')
            <script> console.log('Hi!'); </script>
@stop
