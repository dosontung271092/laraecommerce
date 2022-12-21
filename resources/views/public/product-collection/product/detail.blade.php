@extends('layouts.public')
@section('content')
   <livewire:public.product.detail :category="$category" :product="$product" :products="$products">
@endsection
