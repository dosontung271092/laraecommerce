<?php

namespace App\Http\Livewire\Public\Product;

use Livewire\Component;
use App\Models\Product;

class Index extends Component
{

    public $category, $brandInputs = [], $priceInput;

    protected $queryString = [
        'brandInputs' => ['except' => '', 'as' => 'brand'],
        'priceInput' => ['except' => '', 'as' => 'price']

    ];

    public function mount($category){
        
        $this->category = $category;
    }

    public function render()
    {
        $products = Product::where('category_id', $this->category->id)
                            ->when($this->brandInputs, function($q){
                                $q->whereIn('brand', $this->brandInputs);
                            })
                            ->when($this->priceInput, function($q){
                                $q->when($this->priceInput == 'high-to-low', function($cq){
                                    $cq->orderBy('selling_price', 'DESC');
                                })->when($this->priceInput == 'low-to-high', function($cq){
                                    $cq->orderBy('selling_price', 'ASC');
                                });
                            })
                            ->where('status', '0')
                            ->get();
                            
        return view('livewire.public.product.index', [
            'products' => $products,
            'category' => $this->category
        ]);
    }
}
