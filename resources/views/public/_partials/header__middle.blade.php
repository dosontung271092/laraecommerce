<div class="header__middle page-width">
    <a href="/" class="header-middle__logo">
        <img src="{{ asset('assets/img/olympus-logo.png') }}" class="header-middle-logo__img" alt="logo">
    </a>
    <div class="header-middle__search">
        <form action="{{ url('search') }}" method="GET" class="header-middle-search__form">
            <input type="text" class="header-middle-search-form__input" placeholder="Tìm kiếm các sản phẩm ..." name="keyword" value="{{ !empty( $keyword ) ? $keyword : '' }}">
            <button class="header-middle-search-form__submit">TÌM KIẾM</button>
        </form>
    </div>
    <div class="header-middle__right">
        <div class="header-middle-right__item header-middle-right__item--sm">
            <img class="header-middle-right__icon header-middle-right__icon--search" src="{{ asset('assets/img/icon/search.png') }}">
        </div>
        <div class="header-middle-right__item header-middle-right__item--noxl">
            <img class="header-middle-right__icon" src="{{ asset('assets/img/icon/user.png') }}">
        </div>
        <div class="header-middle-right__item header-middle-right__item--cart">
            <img class="header-middle-right__icon header-middle-right__icon--cart" src="{{ asset('assets/img/icon/cart.png') }}">
            <span class="header-middle-right-cart__notification">3</span>
        </div>
        <div class="header-middle-right__item header-middle-right__item--sm">
            <img class="header-middle-right__icon header-middle-right__icon--menu" src="{{ asset('assets/img/icon/bar.png') }}">
        </div>
    </div>
</div>