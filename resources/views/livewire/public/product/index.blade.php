<main>
   <section class="py-2 text-center container">
      <div class="row py-lg-2">
         <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">{{ $category->name }}</h1>
            <p class="lead text-muted">{{ $category->description }}</p>
         </div>
      </div>
   </section>
   <div class="album py-5 bg-light">
      <div class="container">
         <div class="row">
            @foreach( $products as $item )
            <div class="mb-3 col-lg-3 col-md-4" >
               <div class="card shadow-sm">
                  <div class="text-center mt-3 products-grid__image">
                    @if( $item->productImages )
                        <img src="{{ asset($item->productImages[0]->image) }}" alt="{{ $item->name }}">
                    @else
                        <h5>No Image</h5>
                    @endif
                  </div>
                  <div class="card-body">
                     <a href="{{ url('/product-collection/'.$category->slug.'/'.$item->slug) }}" class="text-dark text-decoration-none">
                        <h5 class="products-grid__name">{{ Str::words($item->name, 10, ' ...') }}</h5>
                     </a>
                     <p class="card-text products-grid__description">{{ Str::words($item->small_description, 20, ' ...') }}</p>
                     <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                           <a href="{{ url('/product-collection/'.$category->slug.'/'.$item->slug) }}" class="btn btn-sm btn-outline-secondary">Xem</a>
                        </div>
                        <div>
                           <del class="text-muted"><small>{{ $item->original_price }} đ</small></del>
                           <span class="text-danger">{{ $item->selling_price }} đ</span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            @endforeach
         </div>
      </div>
   </div>
</main>