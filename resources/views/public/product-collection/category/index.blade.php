@extends('layouts.public')
@section('content')
<nav aria-label="breadcrumb" class="my-3 bg-light px-1">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Danh mục sản phẩm</li>
    </ol>
</nav>
<div class="row">
    <div class="col-md-12 mt-3">
        <h4 class="mb-4">Danh mục sản phẩm</h4>
    </div>
    @forelse( $categories as $item )
            <div class="mb-3 col-lg-3 col-md-4" >
                <div class="card shadow-sm">
                    <div class="text-center mt-3 products-grid__image">
                    @if( $item->image )
                        <img src="{{ asset($item->image) }}" alt="{{ $item->name }}">
                    @else
                        <h5>No Image</h5>
                    @endif
                    </div>
                    <div class="card-body">
                    <a href="{{ url('/product-collection/'.$item->slug) }}" class="text-dark text-decoration-none">
                        <h5 class="products-grid__name">{{ Str::words($item->name, 10, ' ...') }}</h5>
                    </a>
                    <p class="card-text products-grid__description">{{ Str::words($item->description, 20, ' ...') }}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <a href="{{ url('/product-collection/'.$item->slug) }}" class="btn btn-sm btn-outline-secondary">Xem</a>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
    @empty
        <div class="col-md-12">
            <h5>No categories available</h5>
        </div>
    @endforelse
</div>
@endsection