@extends('layouts.public')
@section('style')
    <!-- Link Swiper's CSS -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"
    />

    <!-- Demo styles -->
    <style>
      .product-detail__img .swiper-slide img {
        display: block;
        width: 100%; 
        object-fit: cover;
      }

      .swiper-slide {
        font-size: 18px;
        background: #fff;

        /* Center slide text vertically */
        display: -webkit-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        -webkit-justify-content: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        -webkit-align-items: center;
         align-items: center;
      }
    </style>
@endsection
@section('content')
       <main class="container">
         @include('public._partials.menu')
         @include('public._partials.slider')
         <!-- Post featured -->
         <div class="album ">
            <!-- Swiper -->
            <div class="product-detail__list-product">
               <h3 class="fst-italic text-muted">
                  Các sản phẩm nổi bật
               </h3>
               <div class="swiper mySwiper mt-4">
                  <div class="swiper-wrapper">
                        @forelse($products as $item)
                           <div class="swiper-slide">
                              <div class="card shadow-sm w-100">
                                    <div class="text-center mt-3 products-grid__image">
                                       @if( $item->productImages )
                                          <img src="{{ asset($item->productImages[0]->image) }}" alt="{{ $item->name }}">
                                       @else
                                          <h5>No Image</h5>
                                       @endif
                                    </div>
                                    <div class="card-body">
                                       <a href="{{ url('/product-collection/'.$item->category->slug.'/'.$item->slug) }}" class="text-dark text-decoration-none">
                                          <h5 class="products-grid__name">{{ Str::words($item->name, 10, ' ...') }}</h5>
                                       </a>
                                       <p class="card-text products-grid__description">{{ Str::words($item->small_description, 20, ' ...') }}</p>
                                       <div class="d-flex justify-content-between align-items-center">
                                          <div class="btn-group">
                                                <a href="{{ url('/product-collection/'.$item->category->slug.'/'.$item->slug) }}" class="btn btn-sm btn-outline-secondary">Xem</a>
                                          </div>
                                          <div>
                                                <del><small class="text-muted">{{ $item->original_price }} đ</small></del>
                                                <span class="text-danger">{{ $item->selling_price }} đ</span>
                                          </div>
                                       </div>
                                    </div>
                              </div>
                           </div>
                        @empty
                           <div class="swiper-slide bg-primary">
                              <h5>No products available</h5>
                           </div>
                        @endforelse
                  </div>
                  <div class="swiper-pagination"></div>
               </div>
            </div>
         </div>
         <!-- End post featured -->

         <div class="row g-5 mt-3">
            <div class="col-md-8">
               <h3 class="pb-4 mb-4 fst-italic border-bottom text-muted">
                  Bài viết mới nhất
               </h3>
               <article class="blog-post">
                  <h2 class="blog-post-title mb-1">{{ $post->title }}</h2>
                  <p class="blog-post-meta">{{ $post->created_at }}</p>
                  <div>
                     {!! $post->content !!}
                  </div>
               </article>
            </div>

            <!-- right -->
            <div class="col-md-4">
               <div class="position-sticky" style="top: 2rem;">
                  <div class="p-4 bg-light rounded mb-3">
                     <h4 class="fst-italic">Danh mục bài viết</h4>
                     <ol class="list-unstyled mb-0">
                        @foreach($taxonomies as $key => $item)
                           <li>
                              <a class="py-2 text-decoration-none fst-italic" href="{{ url('/post-collection/'.$item->slug) }}">{{ $item->name }}</a>
                           </li>
                        @endforeach
                     </ol>
                  </div>

                  <div class="p-4 bg-light rounded mb-3">
                     <h4 class="fst-italic">Danh mục sản phẩm</h4>
                     <ol class="list-unstyled mb-0">
                        @foreach($categories as $key => $item)
                           <li>
                              <a class="py-2 text-decoration-none fst-italic" href="{{ url('/product-collection/'.$item->slug) }}">{{ $item->name }}</a>
                           </li>
                        @endforeach
                     </ol>
                  </div>
               </div>
            </div>
            <!-- End right -->
         </div>
      </main>
@endsection
@section('script')
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
      var swiper = new Swiper(".product-detail__list-product .swiper", {
        slidesPerView: 4,
        spaceBetween: 10,
      });
    </script>
@endsection