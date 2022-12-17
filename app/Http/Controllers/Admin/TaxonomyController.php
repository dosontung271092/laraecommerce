<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\TaxonomyFormRequest;
use App\Models\Taxonomy;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class TaxonomyController extends Controller
{

    private $uploadPath = 'uploads/taxonomy/';

    public function index(){
        return view('admin.taxonomy.index');
    }

    public function create(){
        return view('admin.taxonomy.create');
    }

    public function store(TaxonomyFormRequest $request){
        $validateData = $request->validated();

        $taxonomy = new Taxonomy;

        $taxonomy->name = $validateData['name'];
        $taxonomy->slug = Str::slug($validateData['slug']);
        $taxonomy->description = $validateData['description'];
        
        if( $request->hasFile('image') ){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;

            $file->move($this->uploadPath, $filename);
            $taxonomy->image = $this->uploadPath.$filename;
        }

        $taxonomy->meta_title = $validateData['meta_title'];
        $taxonomy->meta_keyword = $validateData['meta_keyword'];
        $taxonomy->meta_description = $validateData['meta_description'];

        $taxonomy->status = $request->status == true ? '1' : '0';
        $taxonomy->save();

        return redirect('admin/taxonomy')->with('message', 'Thêm danh mục thành công');
        
    }

    public function edit(Taxonomy $taxonomy){
        return view('admin.taxonomy.edit', compact('taxonomy'));
    }

    public function update(TaxonomyFormRequest $request, $taxonomy){
        $validateData = $request->validated();
        $taxonomy = Taxonomy::findOrFail($taxonomy);

        $taxonomy->name = $validateData['name'];
        $taxonomy->slug = Str::slug($validateData['slug']);
        $taxonomy->description = $validateData['description'];
        
        if( $request->hasFile('image') ){
            if( File::exists($taxonomy->image) ){
                File::delete($taxonomy->image);
            }

            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            
            $file->move($this->uploadPath, $filename);
            $taxonomy->image = $this->uploadPath. $filename;
        }

        $taxonomy->meta_title = $validateData['meta_title'];
        $taxonomy->meta_keyword = $validateData['meta_keyword'];
        $taxonomy->meta_description = $validateData['meta_description'];

        $taxonomy->status = $request->status == true ? '1' : '0';
        $taxonomy->update();

        return redirect('admin/taxonomy')->with('message', 'Sửa danh mục thành công');
    }

    
}
