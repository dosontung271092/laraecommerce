@extends('layouts.app')
@section('content')
   <livewire:frontend.product.detail :category="$category" :product="$product" :products="$products">
@endsection
