<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="navbar-brand py-0" >
        <a href=""><img class="codeEgg_icon" src="{{ asset('/images/codeEgg_icon.png') }}" alt=""></a> <span class="header-title">クーポンの森(仮)</span>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end"  id="navbarSupportedContent">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link header-login header-btn" href="{{ route('member.login') }}">店舗ログイン</a>
            </li>
        </ul>
    </div>
</nav>

