<?php

namespace App\Http\Livewire\Admin\Taxonomy;

use Livewire\Component;
use App\Models\Taxonomy;
use Livewire\WithPagination;
use Illuminate\Support\Facades\File;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $taxonomy_id;

    public function deleteTaxonomy($taxonomy_id){
        $this->taxonomy_id = $taxonomy_id;
    }

    public function destroyTaxonomy(){
        $taxonomy = Taxonomy::find($this->taxonomy_id);
        if(File::exists($taxonomy->image)){
            File::delete($taxonomy->image);
        }
        $taxonomy->delete();
        session()->flash('message', 'Xóa danh mục thành công');
        $this->dispatchBrowserEvent('close-modal');
    }
    
    public function render()
    {
        $taxonomies = Taxonomy::orderBy('id', 'DESC')->paginate(env('PAGINATION_PER_PAGE'));
        return view('livewire.admin.taxonomy.index', ['taxonomies' => $taxonomies]);
    }
}
