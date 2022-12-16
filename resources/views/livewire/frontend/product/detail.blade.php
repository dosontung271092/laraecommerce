@section('style')
    <!-- Link Swiper's CSS -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"
    />

    <!-- Demo styles -->
    <style>

      /* .product-detail__list-product .swiper {
        width: 100%;
        height: 300px;
      } */

      .product-detail__main .swiper {
        width: 100%;
        height: 100px;
      }

      .swiper-slide {
        text-align: center;
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

      .product-detail__main .swiper-slide img {
        display: block;
        width: 100%; 
        object-fit: cover;
      }
    </style>
@endsection
<main class="container">
    <nav aria-label="breadcrumb" class="my-3">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/collections/'.$category->slug) }}">{{ $product->category ? $product->category->name : 'category' }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
        </ol>
    </nav>
    <div class="row featurette">
        <div class="col-md-7 order-md-2">
        <h2 class="featurette-heading fw-normal lh-1">{{ Str::upper($product->name) }}</h2>
        <div class="mt-1 fs-4 bg-light px-3">
            <del class="text-muted"><small>{{ $product->original_price }} đ</small></del>
            <span class="fw-bold text-danger">{{ $product->selling_price }} đ</span>
        </div>

        <div class="card mt-3">
            <div class="card-header">
                Mô tả sản phẩm
            </div>
            <div class="card-body">
                <p class="lead fs-6">{!! $product->description !!}</p>
            </div>
        </div>

        
        </div>
        <div class="col-md-5 order-md-1 product-detail__main">
            <div class="product-detail__main-image border">
                @if( $product->productImages )
                    <img src="{{ asset($product->productImages[0]->image) }}" alt="{{ $product->name }}" class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto">
                @else
                    <h3>Không tìm thấy hình ảnh</h3>
                @endif
            </div>
            
            <!-- Swiper -->
            <div class="swiper mySwiper mt-2 mb-5">
                <div class="swiper-wrapper">
                    @if( $product->productImages )
                        @foreach( $product->productImages as $key => $item )
                            <div class="swiper-slide border">
                                <img src="{{ asset($item->image) }}" alt="{{ $item->name }}" height="100%">
                            </div>
                        @endforeach
                    @else
                        <h3>Không tìm thấy hình ảnh</h3>
                    @endif
                    
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
</main>

<div class="album py-5 bg-light">
      <div class="container">
            <!-- Swiper -->
            <div class="product-detail__list-product">
                <h3>Các sản phẩm khác</h3>
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
                                        <h5 class="products-grid__name">{{ Str::words($item->name, 100, ' ...') }}</h5>
                                        <p class="card-text products-grid__description">{{ Str::words($item->description, 20, ' ...') }}</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                            <a href="{{ url('/collections/'.$category->slug.'/'.$item->slug) }}" class="btn btn-sm btn-outline-secondary">Xem</a>
                                            </div>
                                            <div>
                                            <del class="text-muted">{{ $item->original_price }} VND</del>
                                            <small class="text-muted">{{ $item->selling_price }} VND</small>
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
</div>
@section('script')
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
      var swiper = new Swiper(".product-detail__main .swiper", {
        slidesPerView: 5,
        spaceBetween: 5,
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
      });

      var swiper = new Swiper(".product-detail__list-product .swiper", {
        slidesPerView: 4,
        spaceBetween: 10,
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
      });
    </script>
@endsection