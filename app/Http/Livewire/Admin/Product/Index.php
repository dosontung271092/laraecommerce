<?php

namespace App\Http\Livewire\Admin\Product;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $products = Product::orderBy('id', 'DESC')->paginate(env('PAGINATION_PER_PAGE'));
        return view('livewire.admin.product.index', compact('products'));
    }
}
