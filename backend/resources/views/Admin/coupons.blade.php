@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')


    <div class="card">
        <div class="card-header">
            <h3 class="card-title">タグ管理</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>ID @sortablelink('id','↕︎')</th>
                    <th>ユーザーID</th>
                    <th>クーポン名</th>
                    <th>公開状態</th>
                    <th>投稿日時</th>
                    <th colspan="2">操作</th>
                </tr>
                </thead>
                <tbody>
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
                @foreach( $coupons as $coupon )
                    <tr>
                        <td>{{ $coupon->id }}</td>
                        <td>{{ $coupon->user_id }}</td>
                        <td>{{ $coupon->coupon_name }}</td>
                        <td>{{ $coupon->release_status ? '公開' : '非公開' }}</td>
                        <td>
                            <a class="btn btn-xs btn-primary" href="{{ route('admin.coupons.edit',$coupon->id) }}">編集</a>
                        </td>
                        <td>
                            <button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#Modal{{ $coupon->id }}">削除</button>
                        </td>
                    </tr>

                    <!-- 削除Modal -->
                    <div class="modal fade" id="Modal{{ $coupon->id }}" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="ModalLabel">削除確認</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    {{ $coupon->coupon_name }}を削除しますか？
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">いいえ</button>
                                    <form method="POST" action="{{route('admin.coupons.delete')}}">
                                        @csrf
                                        <input hidden name="id" type="text" value="{{$coupon->id}}">
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
                <a href="{{ route('admin.coupons.create') }}" class="btn btn-info">新規作成</a>
                <div style="float:right">{{$coupons->appends(request()->input())->links()}}</div>
            </div>
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
