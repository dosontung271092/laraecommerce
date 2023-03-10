<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryFormRequest;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{

    private $uploadPath = 'uploads/category/';

    public function index(){
        return view('admin.category.index');
    }

    public function create(){
        return view('admin.category.create');
    }

    public function store(CategoryFormRequest $request){
        $validateData = $request->validated();
        $category = new Category;

        $category->name = $validateData['name'];
        $category->slug = Str::slug($validateData['slug']);
        $category->description = $validateData['description'];
        
        if( $request->hasFile('image') ){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;

            $file->move($this->uploadPath, $filename);
            $category->image = $this->uploadPath.$filename;
        }

        $category->meta_title = $validateData['meta_title'];
        $category->meta_keyword = $validateData['meta_keyword'];
        $category->meta_description = $validateData['meta_description'];

        $category->status = $request->status == true ? '1' : '0';
        $category->save();

        return redirect('admin/category')->with('message', 'Thêm danh mục thành công');
        
    }

    public function edit(Category $category){
        return view('admin.category.edit', compact('category'));
    }

    public function update(CategoryFormRequest $request, $category){
        $validateData = $request->validated();
        $category = Category::findOrFail($category);

        $category->name = $validateData['name'];
        $category->slug = Str::slug($validateData['slug']);
        $category->description = $validateData['description'];
        
        if( $request->hasFile('image') ){
            if( File::exists($category->image) ){
                File::delete($category->image);
            }

            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            
            $file->move($this->uploadPath, $filename);
            $category->image = $this->uploadPath. $filename;
        }

        $category->meta_title = $validateData['meta_title'];
        $category->meta_keyword = $validateData['meta_keyword'];
        $category->meta_description = $validateData['meta_description'];

        $category->status = $request->status == true ? '1' : '0';
        $category->update();

        return redirect('admin/category')->with('message', 'Sửa danh mục thành công');
    }

    
}
