@extends('layouts.public')
@section('content')
<nav aria-label="breadcrumb" class="my-3 bg-light px-1">
   <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
      <li class="breadcrumb-item">Tìm kiếm</li>
   </ol>
</nav>
<div class="row py-lg-2">
      <div class="col-lg-12 col-md-8 mx-auto">
         <h3 class="fw-light">Các sản phẩm được tìm thấy bởi từ khóa: "<b>{{ $keyword }}</b>"</h3>
      </div>
</div>
<div class="row">
   @foreach( $products as $item )
      <div class="mb-3 col-lg-3 col-md-4" >
         <div class="card shadow-sm">
            <div class="text-center mt-3 products-grid__image">
            @if( $item->productImages )
                  <img src="{{ asset($item->productImages[0]->image) }}" alt="{{ $item->name }}">
            @else
                  <h5>No Image</h5>
            @endif
            </div>
            <div class="card-body">
               <a href="{{ url('/product-collection/'.$item->category->slug.'/'.$item->slug) }}" class="text-dark text-decoration-none">
                  <h5 class="products-grid__name">{{ Str::words($item->name, 10, ' ...') }}</h5>
               </a>
               <p class="card-text products-grid__description">{{ Str::words($item->small_description, 20, ' ...') }}</p>
               <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                     <a href="{{ url('/product-collection/'.$item->category->slug.'/'.$item->slug) }}" class="btn btn-sm btn-outline-secondary">Xem</a>
                  </div>
                  <div>
                     <del class="text-muted"><small>{{ $item->original_price }} đ</small></del>
                     <span class="text-danger">{{ $item->selling_price }} đ</span>
                  </div>
               </div>
            </div>
         </div>
      </div>
   @endforeach
</div>
@endsection
