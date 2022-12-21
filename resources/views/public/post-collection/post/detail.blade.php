@extends('layouts.public')
@section('content')
   <livewire:public.post.detail :taxonomy="$taxonomy" :post="$post" :posts="$posts">
@endsection
