<nav aria-label="breadcrumb" class="my-3 bg-light px-1">
   <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
      <li class="breadcrumb-item"><a href="{{ url('/post-collection/'.$taxonomy->slug) }}">{{ $taxonomy->slug }}</a></li>
   </ol>
</nav>
<div class="album">
   <div class="row">
      <div class="col-12 col-md-8">
         @foreach( $posts as $item )
         <div class="mb-4 bg-light rounded p-2">
            <h3><a href="{{ url('/post-collection/'.$taxonomy->slug.'/'.$item->slug) }}">{{ $item->title }}</a></h3>
            <div>
               <div>{!! strip_tags(Str::words($item->content, 60, ' ...')) !!}</div>
               <div><a href="{{ url('/post-collection/'.$taxonomy->slug.'/'.$item->slug) }}">Đọc tiếp</a></div>
            </div>
         </div>
         @endforeach
      </div>
      @include('public._partials.right')
   </div>
</div>