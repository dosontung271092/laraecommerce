<!-- Modal search layout -->
<div class="modal" id="modal__search">
    <div class="modal__overlay"></div>
    <div class="modal__content">
        <div class="modal__header">
            <div class="modal__width">
                <h3 class="modal__title">Tìm kiếm sản phẩm</h3>
                <img class="modal__clsicon" src="{{ asset('assets/img/icon/close.png') }}">
            </div>
        </div>
        <div class="modal__body">
            <div class="modal__width">
                <form action="" class="modal-search__form" method="GET" action="{{ url('search') }}">
                    <input type="text" class="modal-search-form__input" placeholder="Nhập thông tin sản phẩm ..." name="keyword">
                    <button class="modal-search-form__submit">TÌM KIẾM</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal category layout -->
<div class="modal" id="modal__category">
    <div class="modal__overlay"></div>
    <div class="modal__content--left">
        <div class="modal__header">
            <div class="modal__width">
                <h3 class="modal__title">Danh mục sản phẩm</h3>
                <img class="modal__clsicon" src="{{ asset('assets/img/icon/close.png') }}">
            </div>
        </div>

        <div class="modal__body">
            <div class="modal__width">
                <ul class="modal-body__ul">
                    @foreach($categories as $category)
                        <li class="modal-body__li"><a href="{{ url('/product-collection/'.$category->slug) }}" class="modal-body__a">{{ $category->name }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Modal menu layout -->
<div class="modal" id="modal__menu">
    <div class="modal__overlay"></div>
    <div class="modal__content--right">
        <div class="modal__header">
            <div class="modal__width">
                <h3 class="modal__title">Menu</h3>
                <img class="modal__clsicon" src="{{ asset('assets/img/icon/close.png') }}">
            </div>
        </div>
        <div class="modal__body">
            <div class="modal__width">
                <ul class="modal-body__ul">
                    <li class="modal-body__li"><a href="{{ url('/') }}" class="modal-body__a">Trang chủ</a></li>
                    <li class="modal-body__li"><a href="{{ url('/product-collection/') }}" class="modal-body__a">Sản phẩm</a></li>
                    <li class="modal-body__li"><a href="{{ url('/post-collection/') }}" class="modal-body__a">Tin tức</a></li>
                    <li class="modal-body__li"><a href="{{ url('/post-collection/gioi-thieu/ve-chung-toi') }}" class="modal-body__a">Giới thiệu</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Modal cart layout -->
<div class="modal" id="modal__cart">
    <div class="modal__overlay"></div>
    <div class="modal__content--right">
        <div class="modal__header">
            <div class="modal__width">
                <h3 class="modal__title">Giỏ hàng của bạn</h3>
                <img class="modal__clsicon" src="{{ asset('assets/img/icon/close.png') }}">
            </div>
        </div>

        <div class="modal__body">
            <div class="modal__width">
                <ul class="modal-body__ul">
                    <li class="modal-body__li">
                        <a href="" class="modal-body__a modal-body__a--cart">
                            <img class="modal-body-cart__deleteicon" title="Xoá sản phẩm" src="/assets/img/icon/delete.png" alt="">
                            <img class="modal-body-cart__thumnail" src="{{ asset('assets/img/product/product01.jpg') }}" alt="">
                            <div class="modal-body-cart__content">
                                <h3 class="modal-body-cart-content__title">Thực phẩm dành cho người già</h3>
                                <p class="modal-body-cart-content__price">Giá: 240.000 đ</p>
                            </div>
                        </a>
                    </li>
                    <li class="modal-body__li">
                        <a href="" class="modal-body__a modal-body__a--cart">
                            <img class="modal-body-cart__deleteicon" title="Xoá sản phẩm" src="/assets/img/icon/delete.png" alt="">
                            <img class="modal-body-cart__thumnail" src="{{ asset('assets/img/product/product01.jpg') }}" alt="">
                            <div class="modal-body-cart__content">
                                <h3 class="modal-body-cart-content__title">Thực phẩm dành cho người trung tuổi</h3>
                                <p class="modal-body-cart-content__price">Giá: 240.000 đ</p>
                            </div>
                        </a>
                    </li>
                    <li class="modal-body__li">
                        <a href="" class="modal-body__a modal-body__a--cart">
                            <img class="modal-body-cart__deleteicon" title="Xoá sản phẩm" src="/assets/img/icon/delete.png" alt="">
                            <img class="modal-body-cart__thumnail" src="{{ asset('assets/img/product/product01.jpg') }}" alt="">
                            <div class="modal-body-cart__content">
                                <h3 class="modal-body-cart-content__title">Thực phẩm dành cho trẻ em</h3>
                                <p class="modal-body-cart-content__price">Giá: 240.000 đ</p>
                            </div>
                        </a>
                    </li>

                </ul>
            </div>
        </div>

        <div class="modal__footer">
            <div class="modal-footer__cart modal__width">
                <div class="modal-footer-cart__top">
                    <div class="modal-footer-cart-top__total">
                        <label class="modal-footer-cart__label">Số lượng:</label>
                        <span class="modal-footer-cart__value">3</span>
                    </div>
                    <div class="modal-footer-cart-top__price">
                        <label class="modal-footer-cart__label">Giá:</label>
                        <span class="modal-footer-cart__value">200.000 đ</span>
                    </div>
                </div>
                <div class="modal-footer-cart__bottom">
                    <button class="modal-footer-cart-bottom__btn modal-footer-cart-bottom__btn--view">Xem giỏ hàng</button>
                    <button class="modal-footer-cart-bottom__btn modal-footer-cart-bottom__btn--checkout">Thanh toán</button>
                </div>
            </div>
        </div>

    </div>
</div>