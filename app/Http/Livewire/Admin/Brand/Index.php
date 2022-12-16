<?php

namespace App\Http\Livewire\Admin\Brand;

use Livewire\Component;
use App\Models\Brand;
use App\Models\Category;
use Livewire\WithPagination;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $name, $slug, $status, $brand_id, $category_id;

    public function rules(){
        return [
            'name' => 'required|string',
            'slug' => 'required|string',
            'status' => 'nullable'
        ];
    }

    public function resetInput(){
        $this->name = NULL;
        $this->slug = NULL;
        $this->status = NULL;
        $this->brand_id = NULL;
    }

    public function storeBrand(){
       
        $validatedData = $this->validate();
        Brand::create([
            'name' => $this->name,
            'slug' => Str::slug($this->slug),
            'status' => $this->status == true ? '1' : '0'
        ]);
        session()->flash('message', 'Thêm nhãn hiệu thành công');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }

    public function closeModal(){
        $this->resetInput();
    }

    public function editBrand($brand_id){
        $brand = Brand::findOrFail($brand_id);
        $this->brand_id = $brand->id;
        $this->name = $brand->name;
        $this->slug = $brand->slug;
        $this->status = $brand->status;
    }

    public function updateBrand(){
        $validatedData = $this->validate();
        Brand::findOrFail($this->brand_id)->update([
            'name' => $this->name,
            'slug' => Str::slug($this->slug),
            'status' => $this->status == true ? '1' : '0'
        ]);
        session()->flash('message', 'Sửa nhãn hiệu thành công');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }

    public function deleteBrand($brand_id){
        $this->brand_id = $brand_id;
    }

    public function destroyBrand(){
        $brand = Brand::find($this->brand_id);
        $brand->delete();
        session()->flash('message', 'Xóa nhãn hiệu thành công');
        $this->dispatchBrowserEvent('close-modal');
    }
    
    public function render()
    {
        $brands = Brand::orderBy('id', 'DESC')->paginate(env('PAGINATION_PER_PAGE'));
        return view('livewire.admin.brand.index', ['brands' => $brands]);
    }
}
