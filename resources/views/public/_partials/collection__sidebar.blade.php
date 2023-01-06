<div class="collection__sidebar">
    <h3 class="collection-sidebar--header">Danh mục sản phẩm</h3>
    <ul class="collection-sidebar-ul">
        @foreach($categories as $category)
            <li class="collection-sidebar-li"><a class="collection-sidebar-a" href="{{ url('/product-collection/'.$category->slug) }}">{{ $category->name }}</a></li>
        @endforeach
    </ul>
</div>