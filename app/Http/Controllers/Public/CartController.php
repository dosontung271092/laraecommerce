<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Session;

class CartController extends Controller
{
    public function store(Request $request){
        
        if(Auth::check()){
            $newProduct = [
                'id' => time(),
                'user_id' => auth()->user()->id,
                'product_id' => $request->product_id,
                'product_name' => $request->product_name,
                'product_price' => $request->product_price,
                'product_img' => $request->product_img,
                'quantity' => 1
            ];

            $SESSION_CART = !empty(Session::get('SESSION_CART')) ? Session::get('SESSION_CART') : [];
            array_push($SESSION_CART, $newProduct);
            Session::put('SESSION_CART', $SESSION_CART);
        }
        
        return redirect()->back();
    }
}
