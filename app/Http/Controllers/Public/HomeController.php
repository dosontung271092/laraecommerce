<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Category;
use App\Models\Product;
use App\Models\Post;
use App\Models\Taxonomy;
use App\Models\Brand;

class HomeController extends Controller
{
    public function index(){
        $sliders = Slider::where('status', '0')->get();
        
        $taxonomies = Taxonomy::where('status', '0')->take(env('NUMBER_CATEGORY_ITEM_RIGHT'))->get();
        $post = Post::where('status', '0')->orderBy('id', 'DESC')->first();
        $products = Product::where('status', '0')->where('trending', 1)->get();
        $brands = Brand::where('status', '0')->get();
        return view('public.home.index', compact('sliders', 'post', 'taxonomies', 'products', 'brands'));
    }

    public function map(Request $request){
        return view('public.home.map');
    }
}
