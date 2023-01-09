@forelse( $param['products'] as $item )
    <div class="product-grid__item">
        <span class="product-grid__sale">- {{ Number::getSalePricePercent($item->original_price, $item->selling_price) }} %</span>
        <div class="product-grid__content">
            <div class="product-grid__thumnail">
                <img class="product-grid__img" src="{{ asset($item->productImages[0]->image) }}">
            </div>
            <h3 class="product-grid__title">{{ Str::words($item->name, 10, ' ...') }}</h3>
            <h3 class="product-grid__brand">{{ $item->brand ? 'Nhãn hiệu: '.$item->brand->name : '' }}</h3>
            <div class="product-grid__price">
                <del class="product-grid-price__origin">{{ number_format($item->original_price) }} đ</del>
                <span class="product-grid-price__sale">{{ number_format($item->selling_price) }} đ</span>
            </div>
            <a href="{{ url('/product-collection/'.$param['category']->slug.'/'.$item->slug) }}" class="product-grid__viewbtn">
                xem chi tiết
            </a>
        </div>
    </div>
@empty
    <h3 class="product-grid__title">Không có sản phẩm nào</h3>
@endforelse