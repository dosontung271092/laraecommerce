@extends('layouts.public')
@section('style')
<link rel="stylesheet" href="/assets/css/collection.css">
@endsection

@section('content')
<div class="breadcrumb">
   <div class="page-width">
         <h3 class="breadcumb__title">
            Danh mục sản phẩm
         </h3>
   </div>
</div>
<div class="page-width">
    <div class="collection">
        <div class="collection__grid">
            @foreach($categories as $category)
                <div class="collection-grid__item"><a class="collection-grid-a" href="{{ url('/product/'.$category->slug) }}">{{ $category->name }}</a></div>
            @endforeach
        </div>
    </div>
</div> <!-- End page-width -->
@endsection