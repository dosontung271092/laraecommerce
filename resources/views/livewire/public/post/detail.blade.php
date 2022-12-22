<nav aria-label="breadcrumb" class="my-3 bg-light px-1">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ url('/post-collection/'.$taxonomy->slug) }}">{{ $taxonomy ? $taxonomy->name : 'taxonomy' }}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ $post->title }}</li>
    </ol>
</nav>
<div class="album">
    <div class="row">
        <div class="col-8">
            {!! $post->content !!}
        </div>
        @include('public._partials.right')
        </div>
</div>