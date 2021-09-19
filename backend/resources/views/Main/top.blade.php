@extends('layouts.main')

@section('title','トップ')

@section('css')

@endsection

@section('content')
    <div class="main-wrapper" style="margin-top:50px">
        <div id="map"></div>
        <script src="{{ asset('js/map.js') }}"></script>
        <script>
            var markerData = @json($shops);
            var key_word = '{{ $key_word }}';
        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key={{ config('api_key.google_map') }}&callback=initMap"></script>
        <style>
            #map {
                width: 100vw;
                height: 700px;
            }
        </style>

        <div style="margin:2em">
            <form action="{{ route('main.key_word') }}">
                マップの店舗からクーポンを検索
                <div class="row">
                    <div class="col-8">
                        <input name="key_word" type="text" class="form-control" placeholder="郵便番号・住所を入力してください。">
                    </div>
                    <div class="col-4">
                        <button type="submit" class="btn btn-success" >検索</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="row" style="margin:2em">
            @foreach($coupons as $coupon)
                <div class="col-12 col-md-4">
                    <div class="card mb-5">
                        <div class="card-header">
                            {{ $coupon->coupon_name }}
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">クーポン内容</h5>
                            <p class="card-text">{{ $coupon->coupon_content }}</p>
                            <h5 class="card-title">対象者</h5>
                            <p class="card-text">{{ $coupon->target }}</p>
                            <a href="{{ route('main.coupon_detail',$coupon->id) }}" class="btn btn-info">このクーポンを使う</a>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="mt-3">
                <div>{{$coupons->appends(request()->input())->links()}}</div>
            </div>
        </div>

    </div>
@endsection
