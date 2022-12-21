@extends('layouts.public')
@section('content')
    <div class="py-3 py-md-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="mb-4">Danh mục sản phẩm</h4>
                </div>
                @forelse($taxonomies as $item)
                    <div class="col-6 col-md-3">
                        <div class="category-card">
                            <a href="{{ url('/collection/'.$item->slug) }}">
                                <div class="category-card-img">
                                    <img src="{{ asset($item->image) }}" class="w-100" alt="Hình sản phẩm">
                                </div>
                                <div class="category-card-body">
                                    <h5>{{ $item->name }}</h5>
                                </div>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-md-12">
                        <h5>No taxonomies available</h5>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection
