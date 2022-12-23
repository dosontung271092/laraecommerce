<?php

namespace App\Http\Livewire\Admin\Post;

use Livewire\Component;
use App\Models\Post;
use Livewire\WithPagination;
use Illuminate\Support\Facades\File;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $post_id;

    public function deletePost($post_id){
        $this->post_id = $post_id;
    }

    public function destroyPost(){
        $post = Post::find($this->post_id);
        if(File::exists($post->image)){
            File::delete($post->image);
        }
        $post->delete();
        session()->flash('message', 'Xóa bài viết thành công');
        $this->dispatchBrowserEvent('close-modal');
    }
    
    public function render()
    {
        $posts = Post::orderBy('id', 'DESC')->paginate(env('PAGINATION_PER_PAGE'));
        return view('livewire.admin.post.index', ['posts' => $posts]);
    }
}
