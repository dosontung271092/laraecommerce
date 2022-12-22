<?php

namespace App\Http\Livewire\Public\Post;

use Livewire\Component;
use App\Models\Post;
use Livewire\WithPagination;
use App\Models\Taxonomy;
use App\Models\Category;

class Index extends Component
{

    use WithPagination;

    public $taxonomy;

    public function mount($taxonomy){
        
        $this->taxonomy = $taxonomy;
    }

    public function render()
    {
        $posts = Post::where('taxonomy_id', $this->taxonomy->id)->get();
        $categories = Category::where('status', '0')->take(env('PAGINATION_PER_PAGE'))->get();
        $taxonomies = Taxonomy::where('status', '0')->take(env('PAGINATION_PER_PAGE'))->get();

        return view('livewire.public.post.index', [
            'posts' => $posts,
            'taxonomy' => $this->taxonomy,
            'taxonomies' => $taxonomies,
            'categories' => $categories
        ]);
    }
}
