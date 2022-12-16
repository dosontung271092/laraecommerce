<?php

namespace App\Http\Livewire\Frontend\Product;

use Livewire\Component;

class Detail extends Component
{

    public $category, $product, $products, $prodColorSelectedQuantity;

    public function colorSelected($productColorId){
        // dd($productColorId);
        $productColor = $this->product->productColors()->where('id', $productColorId)->first();
        $this->prodColorSelectedQuantity = $productColor->quantity;
        if( $this->prodColorSelectedQuantity == 0 ){
            $this->prodColorSelectedQuantity = 'outOfStock';
        }
    }

    public function mount($category, $product, $products){
        $this->category = $category;
        $this->products = $products;
        $this->product = $product;
    }

    public function render()
    {
        return view('livewire.frontend.product.detail', [
            'category' => $this->category,
            'products' => $this->products,
            'product' => $this->product
        ]);
    }
}
