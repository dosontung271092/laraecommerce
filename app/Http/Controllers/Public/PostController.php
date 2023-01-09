<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Taxonomy;
use App\Models\Post;

class PostController extends Controller
{


    public function index( $taxonomy ){
        $taxonomy = Taxonomy::where('slug', $taxonomy)->where('status', '0')->first();
        $posts = Post::where('taxonomy_id', $taxonomy->id)->where('status', '0')->get();
        return view('public.post.index', compact('posts', 'taxonomy'));
    }

    public function detail($taxonomy, $slug){
        
        $taxonomy = Taxonomy::where('slug', $taxonomy)->where('status', '0')->first();
        
        if( $taxonomy ){
            $post = $taxonomy->posts()->where('slug', $slug)->where('status', '0')->first();
            $posts = Post::where('taxonomy_id', $taxonomy->id)->where('slug', '!=', $slug)->get();
        }

        return view('public.post.detail', compact('post', 'taxonomy', 'posts'));
    }
}
