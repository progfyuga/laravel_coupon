<header>
    <nav class="navbar navbar-light bg-light ">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('member.top') }}">
                <img src="" alt="" class="d-inline-block align-top">
                CodeEgg
            </a>
            <div class="d-flex">
                <a class="mypage-button" href="{{ route('member.user') }}">マイページ</a>
                <a class="logout-button" role="button" rel="nofollow" data-method="POST" href="{{ route('member.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">LOGOUT</a>
                <form id="logout-form" action="{{ route('member.logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
            </div>
        </div>
    </nav>
</header>