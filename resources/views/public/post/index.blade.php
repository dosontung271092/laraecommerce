
@extends('layouts.public')

@section('style')
<link rel="stylesheet" href="/assets/css/collection.css">
@endsection

@section('content')
<div class="breadcrumb">
   <div class="page-width">
         <h3 class="breadcumb__title">
            Danh sách bài viết
         </h3>
         <h3 class="breadcumb__title breadcumb__title--left">
            {{ !empty( $taxonomy->name ) ? $taxonomy->name : '' }}
         </h3>
   </div>
</div>
<div class="page-width">
    <div class="collection">
        <div class="collection__grid">
            @foreach($posts as $post)
                <div class="collection-grid__item"><a class="collection-grid-a" href="{{ url('post/'.$taxonomy->slug.'/'.$post->slug) }}">{{ Str::words($post->title, 10, ' ...') }}</a></div>
            @endforeach
        </div>
    </div>
</div> <!-- End page-width -->
@endsection