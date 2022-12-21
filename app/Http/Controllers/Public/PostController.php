<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Taxonomy;
use App\Models\Post;

class PostController extends Controller
{
    public function taxonomy(){
        $taxonomies = Taxonomy::where('status', '0')->get();
        return view('public.post-collection.taxonomy.index', compact('taxonomies'));
    }

    public function post( $taxonomy_slug ){
        $taxonomy = Taxonomy::where('slug', $taxonomy_slug)->where('status', '0')->first();
        
        if( $taxonomy ){
            return view('public.post-collection.post.index', compact('taxonomy'));
        }

        return redirect()->back();
    }

    public function detail($taxonomy_slug, $post_slug){
        
        $taxonomy = Taxonomy::where('slug', $taxonomy_slug)->where('status', '0')->first();
        
        if( $taxonomy ){
            $post = $taxonomy->posts()
                                ->where('slug', $post_slug)
                                ->where('status', '0')
                                ->first();
            
            $posts = Post::where('taxonomy_id', $taxonomy->id)->where('slug', '!=', $post_slug)->get();

            if($post){
                return view('public.post-collection.post.detail', compact('post', 'taxonomy', 'posts'));
            }
        }

        return redirect()->back();
    }
}
