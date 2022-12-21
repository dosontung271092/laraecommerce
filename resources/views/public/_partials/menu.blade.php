<div class="nav-scroller py-1 mb-2">
    <nav class="nav d-flex justify-content-between">
        @foreach($categories as $key => $item)
            @if( $key <= 5 )
                <a class="py-2 link-secondary" href="{{ url('/product-collection/'.$item->slug) }}">{{ $item->name }}</a>
            @endif
        @endforeach
    </nav>
</div>