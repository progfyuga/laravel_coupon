<header>
    <nav class="navbar navbar-light bg-light ">
        <div class="container-fluid">
            <div class="navbar-brand">
                <a  href="{{ route('member.top') }}">
                    店舗画面へ
                </a>
                /
                <a href="{{ route('main.top') }}">
                    トップページへ
                </a>
            </div>

            <div class="d-flex">
                <a class="mypage-button" href="{{ route('member.user.index') }}">マイページ</a>
                <a class="logout-button" role="button" rel="nofollow" data-method="POST" href="{{ route('member.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">LOGOUT</a>
                <form id="logout-form" action="{{ route('member.logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
            </div>
        </div>
    </nav>
</header>
