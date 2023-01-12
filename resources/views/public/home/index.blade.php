@extends('layouts.public')
@section('content')
<div class="page-width">
    <section class="slider__section">
        <div class="slider__main swiper">
            <div class="swiper-wrapper">
                @foreach($sliders as $key => $item)
                    <div class="swiper-slide slider-main__item">
                        <img class="slider-main__img" src="{{ $item->image }}">
                        <div class="slider-main__content">
                            <p class="slider-main__sale">Sale 50%</p>
                            <h3 class="slider-main__title">
                                {{ $item->title }}
                            </h3>
                            <p class="slider-main__description">{{ $item->description }}</p>
                            <button class="slider-main__viewbtn">
                                xem chi tiết
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="swiper-pagination"></div>
        </div>

        <div class="slider__next">
            <div class="slider-next__item">
                <img class="slider-next__img" src="./assets/img/slide/next-slide-1.png">
                <div class="slider-next__content">
                    <p class="slider-next__sale">Sale 50%</p>
                    <h3 class="slider-next__title">
                        Chăm sóc da tự nhiên
                    </h3>
                    <button class="slider-next__viewbtn">
                        xem chi tiết
                    </button>
                </div>
            </div>
            <div class="slider-next__item">
                <img class="slider-next__img" src="./assets/img/slide/next-slide-2.png">
                <div class="slider-next__content">
                    <p class="slider-next__sale">Sale 50%</p>
                    <h3 class="slider-next__title">
                        Bổ sung dưỡng chất
                    </h3>
                    <button class="slider-next__viewbtn">
                        xem chi tiết
                    </button>
                </div>
            </div>
        </div>

    </section> <!-- End slider -->

    <section class="brand__section">
        <div class="brand__latest swiper">
            <div class="swiper-wrapper brand-row__wrapper">
                <div class="swiper-slide brand-row__item">
                    <div class="brand-row__content">
                        <div class="brand-row__thumnail">
                            <img class="brand-row__img" src="./assets/img/brand/brand_01.png">
                        </div>
                    </div>
                </div>
                <div class="swiper-slide brand-row__item">
                    <div class="brand-row__content">
                        <div class="brand-row__thumnail">
                            <img class="brand-row__img" src="./assets/img/brand/brand_02.png">
                        </div>
                    </div>
                </div>
                <div class="swiper-slide brand-row__item">
                    <div class="brand-row__content">
                        <div class="brand-row__thumnail">
                            <img class="brand-row__img" src="./assets/img/brand/brand_03.png">
                        </div>
                    </div>
                </div>
                <div class="swiper-slide brand-row__item">
                    <div class="brand-row__content">
                        <div class="brand-row__thumnail">
                            <img class="brand-row__img" src="./assets/img/brand/brand_04.png">
                        </div>
                    </div>
                </div>
                <div class="swiper-slide brand-row__item">
                    <div class="brand-row__content">
                        <div class="brand-row__thumnail">
                            <img class="brand-row__img" src="./assets/img/brand/brand_05.png">
                        </div>
                    </div>
                </div>
                <div class="swiper-slide brand-row__item">
                    <div class="brand-row__content">
                        <div class="brand-row__thumnail">
                            <img class="brand-row__img" src="./assets/img/brand/brand_06.png">
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </section> <!-- End brand -->

    <section class="product__section">
        <div class="product__latest swiper">
            <div class="product-row__header">
                <h3 class="product-row-header__title">
                    Sản phẩm mới nhất
                </h3>  
                <div class="product-row-header__navigation">
                    <img src="./assets/img/icon/previous.png" class="product-row-header__btn product-row-header__btn--next">
                    <img src="./assets/img/icon/next.png" class="product-row-header__btn product-row-header__btn--prev">
                </div>
            </div>
        
            <div class="swiper-wrapper product-row__wrapper">
                @forelse($products as $item)
                    <div class="swiper-slide product-row__item">
                        <span class="product-row__sale">- {{ Number::getSalePricePercent($item->original_price, $item->selling_price) }} %</span>
                        <div class="product-row__content">
                            <div class="product-row__thumnail">
                                <img class="product-row__img" src="{{ asset($item->productImages[0]->image) }}">
                            </div>
                            <h3 class="product-row__title">{{ Str::words($item->name, 10, ' ...') }}</h3>
                            <div class="product-row__price">
                                <del class="product-row-price__origin">{{ number_format($item->original_price) }} đ</del>
                                <span class="product-row-price__sale">{{ number_format($item->selling_price) }} đ</span>
                            </div>
                            <a class="product-row__viewbtn" href="{{ url('/product/'.$item->category->slug.'/'.$item->slug) }}">
                                xem chi tiết
                            </a>
                        </div>
                    </div>
                @empty
                    <h5>No products available</h5>
                @endforelse
            </div>
            
        </div>
    </section> <!-- End product -->

    <section class="banner__section">
        <div class="banner__item">
            <img class="banner__img" src="./assets/img/slide/slide01.jpg">
            <div class="banner__content">
                <p class="banner__sale">Sale 50%</p>
                <h3 class="banner__title">
                    Chăm sóc da tự nhiên
                </h3>
                <button class="banner__viewbtn">
                    xem chi tiết
                </button>
            </div>
        </div>
        <div class="banner__item">
            <img class="banner__img" src="./assets/img/slide/slide01.jpg">
            <div class="banner__content">
                <p class="banner__sale">Sale 50%</p>
                <h3 class="banner__title">
                    Chăm sóc da tự nhiên
                </h3>
                <button class="banner__viewbtn">
                    xem chi tiết
                </button>
            </div>
        </div>
        <div class="banner__item">
            <img class="banner__img" src="./assets/img/slide/slide01.jpg">
            <div class="banner__content">
                <p class="banner__sale">Sale 50%</p>
                <h3 class="banner__title">
                    Chăm sóc da tự nhiên
                </h3>
                <button class="banner__viewbtn">
                    xem chi tiết
                </button>
            </div>
        </div>
    </section><!-- Best product sale -->

    <section class="post__section">
        <div class="post__latest swiper">
            <div class="post-row__header">
                <h3 class="post-row-header__title">
                    Bài viết mới nhất
                </h3>  
                <div class="post-row-header__navigation">
                    <img src="./assets/img/icon/previous.png" class="post-row-header__btn post-row-header__btn--next">
                    <img src="./assets/img/icon/next.png" class="post-row-header__btn post-row-header__btn--prev">
                </div>
            </div>
        
            <div class="swiper-wrapper post-row__wrapper">
                <div class="swiper-slide post-row__item">
                    <div class="post-row__content">
                        <div class="post-row__thumnail">
                            <img class="post-row__img" src="./assets/img/slide/slide01.jpg">
                        </div>
                        <p class="post-row__date">30-12-2022</p>
                        <h3 class="post-row__title">Lorem ipsum dolor sit amet.</h3>
                        <p class="post-row__description">Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
                        <a href="#" class="post-row__viewlink">
                            xem chi tiết
                        </a>
                    </div>
                    
                </div>
                <div class="swiper-slide post-row__item">
                    <div class="post-row__content">
                        <div class="post-row__thumnail">
                            <img class="post-row__img" src="./assets/img/post/post01.jpg">
                        </div>
                        <p class="post-row__date">30-12-2022</p>
                        <h3 class="post-row__title">Lorem ipsum dolor sit amet.</h3>
                        <p class="post-row__description">Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
                        <a href="#" class="post-row__viewlink">
                            xem chi tiết
                        </a>
                    </div>
                </div>
                <div class="swiper-slide post-row__item">
                    <div class="post-row__content">
                        <div class="post-row__thumnail">
                            <img class="post-row__img" src="./assets/img/post/post01.jpg">
                        </div>
                        <p class="post-row__date">30-12-2022</p>
                        <h3 class="post-row__title">Lorem ipsum dolor sit amet.</h3>
                        <p class="post-row__description">Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
                        <a href="#" class="post-row__viewlink">
                            xem chi tiết
                        </a>
                    </div>
                </div>
                <div class="swiper-slide post-row__item">
                    <div class="post-row__content">
                        <div class="post-row__thumnail">
                            <img class="post-row__img" src="./assets/img/post/post01.jpg">
                        </div>
                        <p class="post-row__date">30-12-2022</p>
                        <h3 class="post-row__title">Lorem ipsum dolor sit amet.</h3>
                        <p class="post-row__description">Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
                        <a href="#" class="post-row__viewlink">
                            xem chi tiết
                        </a>
                    </div>
                </div>
                <div class="swiper-slide post-row__item">
                    <div class="post-row__content">
                        <div class="post-row__thumnail">
                            <img class="post-row__img" src="./assets/img/post/post01.jpg">
                        </div>
                        <p class="post-row__date">30-12-2022</p>
                        <h3 class="post-row__title">Lorem ipsum dolor sit amet.</h3>
                        <p class="post-row__description">Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
                        <a href="#" class="post-row__viewlink">
                            xem chi tiết
                        </a>
                    </div>
                </div>
                <div class="swiper-slide post-row__item">
                    <div class="post-row__content">
                        <div class="post-row__thumnail">
                            <img class="post-row__img" src="./assets/img/post/post01.jpg">
                        </div>
                        <p class="post-row__date">30-12-2022</p>
                        <h3 class="post-row__title">Lorem ipsum dolor sit amet.</h3>
                        <p class="post-row__description">Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
                        <a href="#" class="post-row__viewlink">
                            xem chi tiết
                        </a>
                    </div>
                </div>
                <div class="swiper-slide post-row__item">
                    <div class="post-row__content">
                        <div class="post-row__thumnail">
                            <img class="post-row__img" src="./assets/img/post/post01.jpg">
                        </div>
                        <p class="post-row__date">30-12-2022</p>
                        <h3 class="post-row__title">Lorem ipsum dolor sit amet.</h3>
                        <p class="post-row__description">Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
                        <a href="#" class="post-row__viewlink">
                            xem chi tiết
                        </a>
                    </div>
                </div>
                <div class="swiper-slide post-row__item">
                    <div class="post-row__content">
                        <div class="post-row__thumnail">
                            <img class="post-row__img" src="./assets/img/post/post01.jpg">
                        </div>
                        <p class="post-row__date">30-12-2022</p>
                        <h3 class="post-row__title">Lorem ipsum dolor sit amet.</h3>
                        <p class="post-row__description">Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
                        <a href="#" class="post-row__viewlink">
                            xem chi tiết
                        </a>
                    </div>
                </div>
            </div>
            
        </div>
    </section> <!-- End post -->
</div> <!-- End page-width -->
@endsection
