<header class="header">
    <div class="header__top">
        <div class="page-width">
            <ul class="header-top__ul header-top__ul--sm">
                <li class="header-top__li">
                    Công ty cổ phần dược mỹ phẩm olympus
                </li>
                <li class="header-top__li header-top__li--separate">
                    Hotline 0966.96.96.22
                </li>
            </ul>

            <ul class="header-top__ul header-top__ul--sm">
                @if (Route::has('login'))
                    @auth
                        <li class="header-top__li">{{ Auth::user()->name }}</li>
                        <li class="header-top__li header-top__li--separate">
                            <a 
                                class="header-top__a" 
                                href="{{ route('logout') }}" 
                                onclick="event.preventDefault(); 
                                document.getElementById('logout-form').submit();"
                            
                            >Đăng xuất</a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    @else
                        <li class="header-top__li"><a class="header-top__a" href="{{ route('register') }}">Đăng ký</a></li>
                        <li class="header-top__li header-top__li--separate"><a class="header-top__a" href="{{ route('login') }}">Đăng nhập</a></li>
                    @endauth
                @endif
            </ul>
        </div>
    </div>

    @include('public._partials.header__middle')

    <nav class="header__nav">
        <div class="page-width">
            <div class="header-nav__category">
                <button class="header-nav__catbtn" id="header-nav__catbtn">
                    <img class="header-nav-category__icon" src="{{ asset('assets/img/icon/category.png') }}">
                    <span class="header-nav-category__text">Danh mục sản phẩm</span>
                </button>
            </div>
            <ul class="header-nav__ul header-nav__ul--menu header-nav__ul--lg">
                <li class="header-nav__li"><a class="header-nav__a" href="{{ url('/') }}">Trang chủ</a></li>
                <li class="header-nav__li"><a class="header-nav__a" href="{{ url('/category/') }}">Sản phẩm</a></li>
                <li class="header-nav__li"><a class="header-nav__a" href="{{ url('/taxonomy/') }}">Tin tức</a></li>
                <li class="header-nav__li"><a class="header-nav__a" href="{{ url('/post/gioi-thieu/ve-chung-toi') }}">Giới thiệu</a></li>
            </ul>
            <ul class="header-nav__ul header-nav__ul--freeship">
                <li class="header-nav__li">Free ship với đơn từ <span class="header-nav-ul-freeship__value">100.000 đ +</span></li>
            </ul>
        </div>
    </nav>
</header>

<header class="header__scroll" id="header__scroll">
    @include('public._partials.header__middle')
</header>