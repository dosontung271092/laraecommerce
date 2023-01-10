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
    public function index( $category ){
        $category = Category::where('slug', $category)->where('status', '0')->first();
        $products = Product::where('category_id', $category->id)->where('status', '0')->get();
        $brands   = Brand::where('status', '0')->get();
        return view('public.product.index', compact('category', 'products', 'brands'));
    }

    public function search(Request $request){
        // Product
        $pQuery = Product::where('status', '0');

        if( !empty($request->keyword) ){
            $pQuery->where('name','LIKE','%'.$request->keyword.'%');
        }

        if( !empty($request->category) ){
            $category = Category::where('status', '0')->where('slug', $request->category)->first();
            $pQuery->where('category_id', $category->id);
        }

        if( !empty($request->search_price_from) ){
            $pQuery->where('selling_price', '>=', $request->search_price_from);
        }

        if( !empty($request->search_price_to) ){
            $pQuery->where('selling_price', '<=', $request->search_price_to);
        }

        if( !empty($request->search_brand) ){
            $pQuery->whereIn('brand_id', $request->search_brand);
        }

        $products = $pQuery->get();

        // Brand
        $brands = Brand::where('status', '0')->get();

        return view('public.product.index', compact('products', 'brands'));
    }

    public function detail($category, $slug){
        
        $category = Category::where('slug', $category)->where('status', '0')->first();
        if( empty( $category ) ){
            return redirect()->back();
        }

        $product = $category->products()->where('slug', $slug)->where('status', '0')->first();
        if( empty( $product ) ){
            return redirect()->back();
        }

        $products = Product::where('category_id', $category->id)->where('slug', '!=', $slug)->get();

        return view('public.product.detail', compact('category', 'product', 'products'));
    }
}
