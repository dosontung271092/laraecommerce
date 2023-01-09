@extends('layouts.public')
@section('content')
   <div class="breadcrumb">
      <div class="page-width">
            <h3 class="breadcumb__title">
               Chi tiết bài viết
            </h3>
      </div>
   </div>

   <div class="page-width">
      <div class="post__detail">
            <h1 class="post__title">{{ $post->title }}</h1>
            <p class="post__date">{{ $post->created_at }}</p>
            {!! $post->content !!}
      </div> <!-- End post -->
   </div> <!-- End page-width -->
@endsection
