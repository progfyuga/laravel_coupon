<!DOCTYPE html>
<html lang="ja">

<head>
    <title>ログインページ</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/Member/auth/login.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Parts/footer.css') }}">
</head>

<body>
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('main.top') }}">
                <img src="" alt="" class="d-inline-block align-top">
                CodeEgg
            </a>
        </div>
    </nav>
    <div class="container main-content">

        <div class="theme text-center">
            <h1>ログインページ</h1>
        </div>

        <div class="card border-dark mb-3 mx-auto">

            <div class="card-header">ログインフォーム</div>

            <div class="card-body text-dark">
                <form method="POST" action="{{ route('member.login') }}">
                    @csrf

                    {{--メールアドレス--}}
                    <div class="form-group">
                        <label for="email" class="">メールアドレス</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required　autocomplete="email">
                    </div>
                    {{--ログインパスワード--}}
                    <div class="form-group">
                        <label for="password" class="">ログインパスワード</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
                    </div>

                    <div class="form-group text-center">
                        <button type="submit" class="login-button">ログイン</button>
                    </div>

                </form>
            </div>
        </div>

        <div class="button-group text-center">
            <a class="return-button" href="{{ route('main.top') }}" role="button">戻る</a>
        </div>
    </div>

    @include('Parts.footer')
</body>

</html>