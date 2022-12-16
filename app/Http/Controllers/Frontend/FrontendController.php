<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Category;
use App\Models\Product;

class FrontendController extends Controller
{
    public function index(){
        $sliders = Slider::where('status', '0')->get();
        $categories = Category::where('status', '0')->get();
        return view('frontend.index', compact('sliders', 'categories'));
    }

    public function category(){
        $categories = Category::where('status', '0')->get();
        return view('frontend.collection.category.index', compact('categories'));
    }

    public function product( $category_slug ){
        $category = Category::where('slug', $category_slug)->where('status', '0')->first();
        
        if( $category ){
            return view('frontend.collection.product.index', compact('category'));
        }

        return redirect()->back();
    }

    public function detail($category_slug, $product_slug){
        
        $category = Category::where('slug', $category_slug)->where('status', '0')->first();
        
        
        if( $category ){
            $product = $category->products()
                                ->where('slug', $product_slug)
                                ->where('status', '0')
                                ->first();
            
            $products = Product::where('category_id', $category->id)->where('slug', '!=', $product_slug)->get();

            if($product){
                return view('frontend.collection.product.detail', compact('product', 'category', 'products'));
            }
        }

        return redirect()->back();
    }
}
