@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')


        <div class="card">
            <div class="card-header">
                <h3 class="card-title">インフォメーション</h3>
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
                    @foreach( $information as $info )
                    <tr>
                        <td>{{ $info->id }}</td>
                        <td>{{ $info->subject }}</td>
                        <td>{{ $info->created_at }}</td>
                        <td><a href="{{ route('admin.information.edit',$info->id) }}" class="btn btn-primary btn-xs">編集</a></td>
                        <td>
                            <button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#Modal{{ $info->id }}">削除</button>
                        </td>
                    </tr>

                    <!-- 削除Modal -->
                    <div class="modal fade" id="Modal{{ $info->id }}" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="ModalLabel">削除確認</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    {{ $info->subject }}を削除しますか？
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">いいえ</button>
                                    <form method="POST" action="{{route('admin.information.delete')}}">
                                        @csrf
                                        <input hidden name="id" type="text" value="{{$info->id}}">
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
                    <a href="{{ route('admin.information.create') }}" class="btn btn-info">新規作成</a>
                    <div style="float:right">{{$information->appends(request()->input())->links()}}</div>
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
