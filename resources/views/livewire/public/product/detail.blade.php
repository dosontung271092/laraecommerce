@section('style')
<link rel="stylesheet" href="/assets/css/product-detail.css">
@endsection

@extends('layouts.public')
@section('content')
<div class="breadcrumb">
    <div class="page-width">
        <h3 class="breadcumb__title">
            Chi tiết sản phẩm
        </h3>
    </div>
</div>

<div class="page-width">
    <div class="product__detail">
        <div class="product-detail__left">
            <div class="swiper product-detail-left__featuredslide">
                <div class="swiper-wrapper">
                    @if( $product->productImages )
                        @foreach( $product->productImages as $key => $item )
                            <div class="swiper-slide">
                                <img src="{{ asset($item->image) }}" alt="{{ $item->name }}" height="100%">
                            </div>
                        @endforeach
                    @else
                        <h3>Không tìm thấy hình ảnh</h3>
                    @endif
                </div>
            </div>
                <div thumbsSlider="" class="swiper product-detail-left__thumbslide">
                    <div class="swiper-wrapper">
                        @if( $product->productImages )
                            @foreach( $product->productImages as $key => $item )
                                <div class="swiper-slide">
                                    <img src="{{ asset($item->image) }}" alt="{{ $item->name }}" height="100%">
                                </div>
                            @endforeach
                        @else
                            <h3>Không tìm thấy hình ảnh</h3>
                        @endif
                    </div>
                </div>
        </div>
        <div class="product-detail__right">
            <h1 class="product-detail__title">{{ Str::upper($product->name) }}</h1>
            <div class="product-detail__price">
                <del class="product-detail-price__origin">{{ number_format($product->original_price) }} đ</del>
                <span class="product-detail-price__sale">{{ number_format($product->selling_price) }} đ</span>
            </div>
            <div class="product-detail__summary">
                <div class="product-detail-summary__item">{{ $product->category ? 'Danh mục: '.$product->category->name : '' }}</div>
                <div class="product-detail-summary__item">{{ $product->brand ? 'Xuất xứ: '.$product->brand->name : '' }}</div>
                <div class="product-detail-summary__item">Tình trạng: còn hàng</div>
                <div class="product-detail-summary__item  product-detail-summary__item--description"> {{ $product->small_description ? 'Mô tả ngắn: '.$product->small_description : '' }}</div>
            </div>
            <div class="product-detail-right__bottom">
                <button class="product-detail-right-bottom__btn product-detail-right-bottom__btn--view">Xem giỏ hàng</button>
                <button class="product-detail-right-bottom__btn product-detail-right-bottom__btn--checkout">Mua hàng</button>
            </div>
        </div>
    </div> <!-- End product detail -->
    <div class="product__description">
        <h1 class="product-description__title">Mô tả</h1>
        <div>{!! $product->small_description !!}</div>
    </div>
    <section class="product__section">
        <div class="product__latest swiper">
            <div class="product-row__header">
                <h3 class="product-row-header__title">
                    Các sản phẩm khác
                </h3>  
                <div class="product-row-header__navigation">
                    <img src="./assets/img/icon/previous.png" class="product-row-header__btn product-row-header__btn--next">
                    <img src="./assets/img/icon/next.png" class="product-row-header__btn product-row-header__btn--prev">
                </div>
            </div>
        
            <div class="swiper-wrapper product-row__wrapper">
                @forelse($products as $item)
                    <div class="swiper-slide product-row__item">
                        <span class="product-row__sale">- {{ Price::getSalePercent($item->original_price, $item->selling_price) }} %</span>
                        <div class="product-row__content">
                            <div class="product-row__thumnail">
                                <img class="product-row__img" src="{{ asset($item->productImages[0]->image) }}">
                            </div>
                            <h3 class="product-row__title">{{ Str::words($item->name, 10, ' ...') }}</h3>
                            <div class="product-row__price">
                                <del class="product-row-price__origin">{{ number_format($item->original_price) }} đ</del>
                                <span class="product-row-price__sale">{{ number_format($item->selling_price) }} đ</span>
                            </div>
                            <a class="product-row__viewbtn" href="{{ url('/product-collection/'.$category->slug.'/'.$item->slug) }}">
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
</div> <!-- End page-width -->
@endsection