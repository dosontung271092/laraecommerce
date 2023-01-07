<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Taxonomy;
use App\Models\Brand;

class ProductController extends Controller
{
    public function category(){
        $categories = Category::where('status', '0')->get();
        return view('public.product-collection.category.index', compact('categories'));
    }

    public function product( $category_slug ){
        $param['category'] = Category::where('slug', $category_slug)->where('status', '0')->first();
        if( empty( $param['category'] ) ){
            return redirect()->back();
        }

        $param['brands'] = Brand::where('status', '0')->get();
        return view('public.product-collection.product.index', compact('param'));
    }

    public function detail($category_slug, $product_slug){
        
        $param['category'] = Category::where('slug', $category_slug)->where('status', '0')->first();
        if( empty( $param['category'] ) ){
            return redirect()->back();
        }

        $param['product'] = $param['category']->products()->where('slug', $product_slug)->where('status', '0')->first();
        if( empty( $param['product'] ) ){
            return redirect()->back();
        }

        $param['products'] = Product::where('category_id', $param['category']->id)->where('slug', '!=', $product_slug)->get();

        return view('public.product-collection.product.detail', compact('param'));
    }
}
