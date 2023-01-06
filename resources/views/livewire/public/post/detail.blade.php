@section('style')
<link rel="stylesheet" href="/assets/css/blog.css">
@endsection

@extends('layouts.public')
@section('content')
<div class="breadcrumb">
   <div class="page-width">
         <h3 class="breadcumb__title">
         {{ $post->title }}
         </h3>
   </div>
</div>
<div class="page-width">
    <div class="post__detail">
        <p class="post__date">{{ $post->created_at }}</p>
        <div class="post__content">{!! $post->content !!}</div>
    </div> <!-- End post -->
</div> <!-- End page-width -->
@endsection