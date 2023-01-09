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
        $param['category'] = Category::where('slug', $category)->where('status', '0')->first();
        $param['products'] = Product::where('category_id', $param['category']->id)->where('status', '0')->get();
        $param['brands'] = Brand::where('status', '0')->get();
        return view('public.product.index', compact('param'));
    }

    public function search(Request $request){
        // Product
        $pQuery = Product::where('status', '0');

        if( !empty($request->keyword) ){
            $pQuery->where('name','LIKE','%'.$request->keyword.'%');
        }

        if( !empty($request->category) ){
            $param['category'] = Category::where('status', '0')->where('slug', $request->category)->first();
            $pQuery->where('category_id', $param['category']->id);
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

        $param['products'] = $pQuery->get();

        // Brand
        $param['brands'] = Brand::where('status', '0')->get();

        return view('public.product.index', compact('param'));
    }

    public function detail($category, $slug){
        
        $param['category'] = Category::where('slug', $category)->where('status', '0')->first();
        if( empty( $param['category'] ) ){
            return redirect()->back();
        }

        $param['product'] = $param['category']->products()->where('slug', $slug)->where('status', '0')->first();
        if( empty( $param['product'] ) ){
            return redirect()->back();
        }

        $param['products'] = Product::where('category_id', $param['category']->id)->where('slug', '!=', $slug)->get();

        return view('public.product.detail', compact('param'));
    }
}
