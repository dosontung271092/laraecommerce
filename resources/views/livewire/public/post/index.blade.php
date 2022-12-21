@section('style')
    <!-- Demo styles -->
    <style>
      .post-collection__item .item__short-description{
         height: 85px;
         font-size: 14px;
         overflow: hidden;
      }

      .post-collection__item .item__content{
         background: #9e9e9e17;
         padding: 15px;
      }
    </style>
@endsection
<main>
   <section class="py-2 text-center container">
      <div class="row py-lg-2">
         <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">{{ $taxonomy->name }}</h1>
            <p class="lead text-muted">{{ $taxonomy->description }}</p>
         </div>
      </div>
   </section>
   <div class="album py-5 bg-light">
      <div class="container">
         <div class="row">
            @foreach( $posts as $item )
            <div class="mb-4 post-collection__item">
               <h1 class="item__title"><a href="{{ url('/post-collection/'.$taxonomy->slug.'/'.$item->slug) }}">{{ $item->title }}</a></h1>
               <div class="item__content">
                  <div class="item__short-description">{{ Str::words($item->content, 60, ' ...') }}</div>
                  <div><a href="{{ url('/post-collection/'.$taxonomy->slug.'/'.$item->slug) }}">Đọc tiếp</a></div>
               </div>
            </div>
            @endforeach
         </div>
      </div>
   </div>
</main>