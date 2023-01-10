<?php

namespace App\Http\Livewire\Public\Product;

use Livewire\Component;
use App\Models\Product;

class Index extends Component
{
    public $category, $brands;

    public $search;
 
    protected $queryString = ['search'];

    public function mount($param){
        $this->category = $category;
        $this->brands   = $brands;
    }

    public function render()
    {
        if( !empty( $this->search ) ){
            dd( $this->search );
        }
        // $query = Product::where('category_id', $this->category->id)->where('status', '0');

        // // Filter by brand
        // $query->when($this->filterBrand, function($query){
        //             dd($this->filterBrand);
        //             $query->whereIn('brand_id', $this->filterBrand);
        //         });
        
        // // Get data
        // $products = $query->get();

        $products = Product::where('category_id', $this->category->id)
                            // ->when($this->filterBrand, function($q){
                               
                            //     $q->whereIn('brand_id', $this->filterBrand);
                            // })
                            // ->where('status', '0')
                            ->get();      
                           
                            
        return view('livewire.public.product.index', [
            'products' => $products,
            'category' => $this->category
        ]);
    }
}
