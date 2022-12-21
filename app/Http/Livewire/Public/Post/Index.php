<?php

namespace App\Http\Livewire\Public\Post;

use Livewire\Component;
use App\Models\Post;

class Index extends Component
{

    public $taxonomy;

    public function mount($taxonomy){
        
        $this->taxonomy = $taxonomy;
    }

    public function render()
    {
        $posts = Post::where('taxonomy_id', $this->taxonomy->id)->get();
                            
        return view('livewire.public.post.index', [
            'posts' => $posts,
            'taxonomy' => $this->taxonomy
        ]);
    }
}
