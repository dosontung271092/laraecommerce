<?php

namespace App\Http\Livewire\Admin\Category;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;
use Illuminate\Support\Facades\File;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $category_id;

    public function deleteCategory($category_id){
        $this->category_id = $category_id;
    }

    public function destroyCategory(){
        $category = Category::find($this->category_id);
        if(File::exists($category->image)){
            File::delete($category->image);
        }
        $category->delete();
        session()->flash('message', 'Xóa danh mục thành công');
        $this->dispatchBrowserEvent('close-modal');
    }
    
    public function render()
    {
        $categories = Category::orderBy('id', 'DESC')->paginate(env('PAGINATION_PER_PAGE'));
        return view('livewire.admin.category.index', ['categories' => $categories]);
    }
}
