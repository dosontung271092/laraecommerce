<?php

namespace App\Http\Livewire\Public\Product;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Detail extends Component
{

    public $category, $product, $products, $prodColorSelectedQuantity;

    public function colorSelected($productColorId){
        $productColor = $this->product->productColors()->where('id', $productColorId)->first();
        $this->prodColorSelectedQuantity = $productColor->quantity;
        if( $this->prodColorSelectedQuantity == 0 ){
            $this->prodColorSelectedQuantity = 'outOfStock';
        }
    }

    public function mount($param){
        $this->category = $param['category'];
        $this->products = $param['products'];
        $this->product  = $param['product'];
    }

    public function render()
    {
        return view('livewire.public.product.detail', [
            'category' => $this->category,
            'products' => $this->products,
            'product' => $this->product
        ]);
    }

    function addToCart(int $productId){
        if( Auth::check() ){
            if( $this->product->where('id', $productId)->where('status', '0')->exists() ){
                
            }else{
                dd('Product is not exist!');
            }
        }else{
           dd('You are not loggin!');
        }
    }
}
