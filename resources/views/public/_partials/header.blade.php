<header class="header">
    <div class="header__top">
        <div class="page-width">
            <ul class="header-top__ul header-top__ul--sm">
                <li class="header-top__li header-top__li--lg">Công ty cổ phần dược mỹ phẩm olympus</li>
            </ul>

            <ul class="header-top__ul header-top__ul--sm">
                <li class="header-top__li">Điện thoại hỗ trợ 0966.96.96.22</li>
            </ul>
        </div>
    </div>

    <div class="header__middle page-width">
        <a href="{{ url('/') }}" class="header-middle__logo">
            <img src="./assets/img/olympus-logo.png" class="header-middle-logo__img" alt="logo">
        </a>
        <div class="header-middle__search">
            <form action="" class="header-middle-search__form">
                <input type="text" class="header-middle-search-form__input" placeholder="Tìm kiếm các sản phẩm ...">
                <button class="header-middle-search-form__submit">TÌM KIẾM</button>
            </form>
        </div>
        <div class="header-middle__right">
            <div class="header-middle-right__item header-middle-right__item--myaccount header-middle-right__item--xl">
                <a href="{{ route('login') }}" class="header-middle-right__myacount">Đăng nhập</a>
            </div>
            <div class="header-middle-right__item header-middle-right__item--sm">
                <img class="header-middle-right__icon header-middle-right__icon--search" src="./assets/img/icon/search.png">
            </div>
            <a href="{{ route('login') }}" class="header-middle-right__item header-middle-right__item--noxl">
                <img class="header-middle-right__icon" src="./assets/img/icon/user.png">
            </a>

            <div class="header-middle-right__item header-middle-right__item--sm">
                <img class="header-middle-right__icon header-middle-right__icon--menu" src="./assets/img/icon/bar.png">
            </div>
        </div>
    </div>

    <nav class="header__nav">
        <div class="page-width">
            <div class="header-nav__category">
                <button class="header-nav__catbtn" id="header-nav__catbtn">
                    <img class="header-nav-category__icon" src="./assets/img/icon/category.png">
                    <span class="header-nav-category__text">Danh mục sản phẩm</span>
                </button>
            </div>
            <ul class="header-nav__ul header-nav__ul--menu header-nav__ul--lg">
                <li class="header-nav__li"><a class="header-nav__a" href="{{ url('/') }}">Trang chủ</a></li>
                <li class="header-nav__li"><a class="header-nav__a" href="{{ url('/product-collection/') }}">Sản phẩm</a></li>
                <li class="header-nav__li"><a class="header-nav__a" href="{{ url('/post-collection/') }}">Tin tức</a></li>
                <li class="header-nav__li"><a class="header-nav__a" href="{{ url('/post-collection/gioi-thieu/ve-chung-toi') }}">Giới thiệu</a></li>
            </ul>
            <ul class="header-nav__ul header-nav__ul--freeship">
                <li class="header-nav__li">Free ship với đơn từ <span class="header-nav-ul-freeship__value">100.000 đ +</span></li>
            </ul>
        </div>
    </nav>
</header>

<header class="header__scroll" id="header__scroll">
    <div class="header__middle page-width">
        <div class="header-middle__logo">
            <img src="./assets/img/olympus-logo.png" class="header-middle-logo__img" alt="logo">
        </div>
        <div class="header-middle__search">
            <form action="" class="header-middle-search__form">
                <input type="text" class="header-middle-search-form__input" placeholder="Tìm kiếm các sản phẩm ...">
                <button class="header-middle-search-form__submit">TÌM KIẾM</button>
            </form>
        </div>
        <div class="header-middle__right">
            <div class="header-middle-right__item header-middle-right__item--myaccount header-middle-right__item--xl">
                <a href="#" class="header-middle-right__myacount">Tài khoản của tôi</a>
            </div>
            <div class="header-middle-right__item header-middle-right__item--sm">
                <img class="header-middle-right__icon header-middle-right__icon--search" src="./assets/img/icon/search.png">
            </div>
            <div class="header-middle-right__item header-middle-right__item--noxl">
                <img class="header-middle-right__icon" src="./assets/img/icon/user.png">
            </div>
            <div class="header-middle-right__item header-middle-right__item--cart">
                <img class="header-middle-right__icon header-middle-right__icon--cart" src="./assets/img/icon/cart.png">
                <span class="header-middle-right-cart__notification">3</span>
            </div>
            <div class="header-middle-right__item header-middle-right__item--sm">
                <img class="header-middle-right__icon header-middle-right__icon--menu" src="./assets/img/icon/bar.png">
            </div>
        </div>
    </div>
</header>