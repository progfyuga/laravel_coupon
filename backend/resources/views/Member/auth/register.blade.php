<!DOCTYPE html>
<html lang="ja">

<head>
    <title>会員登録ページ</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/Member/auth/register.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Parts/footer.css') }}">
</head>

<body>
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('main.top') }}">
                <img src="" alt="" class="d-inline-block align-top">
                登録ページ
            </a>
        </div>
    </nav>
    <div class="container main-content">

        <div class="theme text-center">
            <h1>登録ページ</h1>
            @if(count($errors) > 0)
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            @endif
        </div>

        <div class="card border-dark mb-3 mx-auto">

            <div class="card-header">登録フォーム</div>

            <div class="card-body text-dark">

                <form method="POST" action="{{ route('member.register') }}">
                    @csrf

                    <div class="form-group row">
                        <div class="col-12">
                            <label for="name" class="">店舗名</label>
                            <input id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="content" class="">店の説明</label>
                        <div class="col-12">
                            <textarea class="form-control" name="content" id="content" rows='8' style="width: 100%;">{{old('content')}}</textarea>
                        </div>
                    </div>

                    {{--メールアドレス--}}
                    <div class="form-group">
                        <label for="email" class="">メールアドレス</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                    </div>

                    <div class="form-group">
                        <label for="prefecture" class="">都道府県</label>
                        <br>
                        <select class="form-control" name="prefecture_id" id="prefecture">
                            @foreach($prefectures as $prefecture)
                                <option value="{{$prefecture->id}}">{{$prefecture->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    {{--住所--}}
                    <div class="form-group">
                        <label for="address" class="">住所</label>
                        <input id="address" type="" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address">
                    </div>

                    {{--電話番号--}}
                    <div class="form-group">
                        <label for="tel_no" class="">電話番号</label>
                        <input id="tel_no" type="tel" class="form-control @error('tel_no') is-invalid @enderror" name="tel_no" value="{{ old('tel_no') }}" required autocomplete="tel">
                    </div>

                    {{--ログインパスワード--}}
                    <div class="form-group">
                        <label for="password" class="">ログインパスワード</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
                    </div>
                    {{--ログインパスワード確認--}}
                    <div class="form-group">
                        <label for="password_confirmation" class="">ログインパスワード確認</label>
                        <input id="password_confirmation" type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" required>
                    </div>

                    <div class="form-group text-center">
                        <button type="submit" class="register-button">登録</button>
                    </div>
                </form>
            </div>
        </div>
        @include('Parts.footer')
</body>

</html>
