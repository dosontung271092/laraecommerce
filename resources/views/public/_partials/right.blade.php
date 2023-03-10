<!-- right -->
<div class="col-md-4">
    <div class="position-sticky" style="top: 2rem;">
        <div class="p-3 bg-light rounded mb-3">
            <h5 class="fst-italic">Danh mục bài viết</h5>
            <ol class="list-unstyled mb-0">
            @foreach($taxonomies as $key => $item)
                <li>
                    <a class="py-2 text-decoration-none fst-italic link-hover text-primary" href="{{ url('/post-collection/'.$item->slug) }}">{{ $item->name }}</a>
                </li>
            @endforeach
            </ol>
        </div>

        <div class="p-3 bg-light rounded mb-3">
            <h5 class="fst-italic">Danh mục sản phẩm</h5>
            <ol class="list-unstyled mb-0">
            @foreach($categories as $key => $item)
                <li>
                    <a class="py-2 text-decoration-none fst-italic link-hover text-primary" href="{{ url('/product-collection/'.$item->slug) }}">{{ $item->name }}</a>
                </li>
            @endforeach
            </ol>
        </div>
    </div>
</div>
<!-- End right -->