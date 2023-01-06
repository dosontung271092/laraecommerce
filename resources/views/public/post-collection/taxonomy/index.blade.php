
@extends('layouts.public')

@section('style')
<link rel="stylesheet" href="/assets/css/blog.css">
@endsection

@section('content')
<div class="breadcrumb">
   <div class="page-width">
         <h3 class="breadcumb__title">
            Danh mục bài viết
         </h3>
   </div>
</div>
<div class="page-width">
    <div class="blog__grid">
        <div class="blog-grid__wrapper">
            @foreach($taxonomies as $taxonomy)
            <div class="blog-grid__item">
                <div class="blog-grid__content">
                    <div class="blog-grid__thumnail">
                        <img class="blog-grid__img" src="{{ asset($taxonomy->image) }}">
                    </div>
                    <p class="blog-grid__date">{{ $taxonomy->created_at }}</p>
                    <h3 class="blog-grid__title">{{ Str::words($taxonomy->name, 10, ' ...') }}</h3>
                    <p class="blog-grid__description">{{ Str::words($taxonomy->description, 20, ' ...') }}</p>
                    <a href="{{ url('/post-collection/'.$taxonomy->slug) }}" class="blog-grid__viewlink">
                        xem chi tiết
                    </a>
                </div>
                
            </div>
            @endforeach
        </div>
    </div> <!-- End post -->
</div> <!-- End page-width -->
@endsection