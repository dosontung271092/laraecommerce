@section('style')
<link rel="stylesheet" href="{{ asset('assets/css/product/product.css') }}">
@endsection
@extends('layouts.public')
@section('content')
<div class="breadcrumb">
   <div class="page-width">
         <h3 class="breadcumb__title">
            Danh sách sản phẩm
         </h3>
         <h3 class="breadcumb__title breadcumb__title--left">
            {{ !empty( $param['category']->name ) ? $param['category']->name : '' }}
            {!! !empty( request()->keyword ) ? 'Tìm bởi từ khóa <b>"'.request()->keyword.'"</b>' : '' !!}
         </h3>
   </div>
</div>

<div class="product__filter">
   <div class="page-width">
         <button class="product-filter__btn">
            <img class="product-filter__icon" src="{{ asset('assets/img/icon/filter.png') }}" alt=""> 
            <span>Filter</span>
         </button>
   </div>
</div>

<div class="page-width">
   <div class="product">
         <div class="product__sidebar">
            <h3 class="product-sidebar__header">Lọc sản phẩm</h3>
            <form class="product__form" action="{{ url('/product/search') }}" method="POST">
                @csrf
                <input type="hidden" name="category" value="{{ request()->category }}">
                <ul class="product-sidebar__ul">
                    <li class="product-sidebar__li">
                        <h3 class="product-sidebar-item__title">Giá</h3>
                        <div class="product-sidebar-item__body">
                            <label for="product-sidebar-price__input--from">Từ</label>
                            <input type="number" class="product-sidebar-price__input product-sidebar-price__input--from" id="product-sidebar-price__input--from" name="search_price_from" value="{{ request()->search_price_from }}">
                            <label for="product-sidebar-price__input--to">Đến</label>
                            <input type="number" class="product-sidebar-price__input product-sidebar-price__input--to" id="product-sidebar-price__input--to" name="search_price_to" value="{{ request()->search_price_to }}">
                        </div>
                    </li>
                    <li class="product-sidebar__li">
                        <h3 class="product-sidebar-item__title">Nhãn hiệu</h3>
                        <div class="product-sidebar-item__body">
                            <ul class="product-sidebar-brand-ul">
                            @foreach( $param['brands'] as $item )
                                <li class="product-sidebar-brand-li">
                                    <input 
                                       type="checkbox" 
                                       name="search_brand[]" 
                                       value="{{ $item->id }}" 
                                       {{ !empty( request()->search_brand ) && in_array( $item->id,  request()->search_brand ) ? 'checked' : '' }}
                                    >
                                    <label>{{ $item->name }}</label>
                                </li>
                            @endforeach
                            </ul>
                        </div>
                    </li>
                </ul>
                <button class="product-sidebar__filterbtn">Lọc</button>
            </form>
         </div> 

         <!-- End product__sidebar -->
         <div class="product__grid" id="product__grid">
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
                        <a href="{{ url('/product/'.$item->category->slug.'/'.$item->slug) }}" class="product-grid__viewbtn">
                           xem chi tiết
                        </a>
                  </div>
               </div>
            @empty
               <h3 class="product-grid__title">Không có sản phẩm nào</h3>
            @endforelse
         </div>
   </div>
</div> <!-- End page-width -->

@endsection
