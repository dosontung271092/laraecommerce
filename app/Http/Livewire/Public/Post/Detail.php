<?php

namespace App\Http\Livewire\Public\Post;

use Livewire\Component;

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
        return view('livewire.public.post.detail', [
            'taxonomy' => $this->taxonomy,
            'posts' => $this->posts,
            'post' => $this->post
        ]);
    }
}
