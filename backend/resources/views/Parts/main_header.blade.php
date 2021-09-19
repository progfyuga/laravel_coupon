<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="navbar-brand py-0" >
        <a href=""> <span class="header-title">行く〜ポン</span></a>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end"  id="navbarSupportedContent">
        <ul class="navbar-nav">
            <li class="nav-item">
                @if(Auth::check())
                    <a class="nav-link header-login header-btn" href="{{ route('member.top') }}">店舗ページへ</a>
                @else
                    <a class="nav-link header-login header-btn" href="{{ route('member.login') }}">店舗ログイン</a>
                @endif
            </li>
        </ul>
    </div>
</nav>

