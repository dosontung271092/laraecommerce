<?php

namespace App\Http\Livewire\Public\Post;

use Livewire\Component;
use App\Models\Taxonomy;
use App\Models\Category;

class Detail extends Component
{

    public $taxonomy, $post, $posts;

    public function mount($taxonomy, $post, $posts){
        $this->taxonomy = $taxonomy;
        $this->posts = $posts;
        $this->post = $post;
    }

    public function render()
    {
        $categories = Category::where('status', '0')->take(env('PAGINATION_PER_PAGE'))->get();
        $taxonomies = Taxonomy::where('status', '0')->take(env('PAGINATION_PER_PAGE'))->get();

        return view('livewire.public.post.detail', [
            'taxonomy' => $this->taxonomy,
            'posts' => $this->posts,
            'post' => $this->post,
            'taxonomies' => $taxonomies,
            'categories' => $categories
        ]);
    }
}
