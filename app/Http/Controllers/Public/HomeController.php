<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Category;
use App\Models\Product;
use App\Models\Post;
use App\Models\Taxonomy;

class HomeController extends Controller
{
    public function index(){
        $sliders = Slider::where('status', '0')->get();
        $categories = Category::where('status', '0')->take(env('NUMBER_CATEGORY_ITEM_RIGHT'))->get();
        $taxonomies = Taxonomy::where('status', '0')->take(env('NUMBER_CATEGORY_ITEM_RIGHT'))->get();
        $post = Post::where('status', '0')->orderBy('id', 'DESC')->first();
        $products = Product::where('status', '0')->where('trending', 1)->get();
        return view('public.home.index', compact('sliders', 'categories', 'post', 'taxonomies', 'products'));
    }

    public function search(Request $request){
        if( $request->keyword ){
            $keyword = $request->keyword;

            $categories = Category::where('status', '0')->take(env('NUMBER_CATEGORY_ITEM_RIGHT'))->get();
            $taxonomies = Taxonomy::where('status', '0')->take(env('NUMBER_CATEGORY_ITEM_RIGHT'))->get();
    
            $products = Product::where('status', '0')->where('name', 'LIKE', '%'.$keyword.'%')->get();
            return view('public.search.index', compact('products', 'categories', 'taxonomies', 'keyword'));
        }

        return redirect()->back();
    }
}
