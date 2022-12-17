<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PostFormRequest;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Models\Taxonomy;

class PostController extends Controller
{

    private $uploadPath = 'uploads/post/';

    public function index(){
        
        return view('admin.post.index');
    }

    public function create(){
        $taxonomies = Taxonomy::all();
        return view('admin.post.create', compact('taxonomies'));
    }

    public function store(PostFormRequest $request){
        $validateData = $request->validated();
        
        $post = new Post;

        $post->title = $validateData['title'];
        $post->taxonomy_id = $validateData['taxonomy_id'];
        $post->slug = Str::slug($validateData['slug']);
        $post->content = $validateData['content'];
        

        $post->meta_title = $validateData['meta_title'];
        $post->meta_keyword = $validateData['meta_keyword'];
        $post->meta_content = $validateData['meta_content'];

        $post->status = $request->status == true ? '1' : '0';
        $post->save();

        return redirect('admin/post')->with('message', 'Thêm bài viết thành công');
        
    }

    public function edit(Post $post){
        $taxonomies = Taxonomy::all();
        return view('admin.post.edit', compact('post','taxonomies'));
    }

    public function update(PostFormRequest $request, $post){
        $validateData = $request->validated();
        $post = Post::findOrFail($post);

        $post->title = $validateData['title'];
        $post->taxonomy_id = $validateData['taxonomy_id'];
        $post->slug = Str::slug($validateData['slug']);
        $post->content = $validateData['content'];

        $post->meta_title = $validateData['meta_title'];
        $post->meta_keyword = $validateData['meta_keyword'];
        $post->meta_content = $validateData['meta_content'];

        $post->status = $request->status == true ? '1' : '0';
        $post->update();

        return redirect('admin/post')->with('message', 'Sửa bài viết thành công');
    }

    
}
