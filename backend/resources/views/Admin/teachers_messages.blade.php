@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')


    <div class="card">
        <div class="card-header">
            <h3 class="card-title">講師メッセージ</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>ID @sortablelink('id','↕︎')</th>
                    <th>タイトル</th>
                    <th>投稿日時</th>
                    <th colspan="2">操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach( $teachers_messages as $message )
                    <tr>
                        <td>{{ $message->id }}</td>
                        <td>{{ $message->subject }}</td>
                        <td>{{ $message->created_at }}</td>
                        <td><a href="{{ route('admin.teachers_messages.edit',$message->id) }}" class="btn btn-primary btn-xs">編集</a></td>
                        <td>
                            <button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#Modal{{ $message->id }}">削除</button>
                        </td>
                    </tr>

                    <!-- 削除Modal -->
                    <div class="modal fade" id="Modal{{ $message->id }}" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="ModalLabel">削除確認</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    {{ $message->subject }}を削除しますか？
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">いいえ</button>
                                    <form method="POST" action="{{route('admin.teachers_messages.delete')}}">
                                        @csrf
                                        <input hidden name="id" type="text" value="{{$message->id}}">
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
                <a href="{{ route('admin.teachers_messages.create') }}" class="btn btn-info">新規作成</a>
                <div style="float:right">{{$teachers_messages->appends(request()->input())->links()}}</div>
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
