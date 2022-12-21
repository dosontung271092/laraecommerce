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
        $categories = Category::where('status', '0')->take(20)->get();
        $taxonomies = Taxonomy::where('status', '0')->take(20)->get();
        $post = Post::where('status', '0')->first();
        $products = Product::where('status', '0')->take(5)->get();
        return view('public.home.index', compact('sliders', 'categories', 'post', 'taxonomies', 'products'));
    }
}
