<nav class="navbar navbar-expand navbar-dark blue-gradient">

    <a class="navbar-brand" href="/"><i class="far fa-sticky-note mr-1"></i>memo</a>

    <ul class="navbar-nav ml-auto">

        <!-- Collapsible content -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <form class="form-inline ml-auto" method="GET" action="{{ route('breweries.search_index') }}">
                <div class="md-form my-0">
                    <input class="form-control" type="text" name="name" placeholder="" aria-label="Search">
                </div>
                <button class="btn btn-outline-white btn-md my-0 ml-sm-2" type="submit">検索する</button>
            </form>
        </div>
        <!-- Collapsible content -->

        @guest
        <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">ユーザー登録</a>
        </li>
        @endguest

        @guest
        <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">ログイン</a>
        </li>
        @endguest

        @auth
        <li class="nav-item">
            <a class="nav-link" href="{{ route('breweries.create') }}"><i class="fas fa-pen mr-1"></i>投稿する</a>
        </li>
        @endauth

        @auth
        <!-- Dropdown -->
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                <i class="fas fa-user-circle"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                <button class="dropdown-item" type="button" onclick="location.href=''">
                    マイページ
                </button>
                <div class="dropdown-divider"></div>
                <button form="logout-button" class="dropdown-item" type="submit">
                    ログアウト
                </button>
            </div>
        </li>
        <form id="logout-button" method="POST" action="{{ route('logout') }}">
            @csrf
        </form>
        <!-- Dropdown -->
        @endauth

    </ul>

</nav>
