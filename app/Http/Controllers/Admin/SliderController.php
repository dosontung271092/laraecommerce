<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Models\Color;
use App\Http\Requests\SliderFormRequest;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{

    private $uploadPath = 'uploads/slider/';

    public function index(){
        $sliders = Slider::all();
        return view('admin.slider.index', compact('sliders'));
    }

    public function create(){
        return view('admin.slider.create');
    }

    public function store(SliderFormRequest $request){
        $validateData = $request->validated();
        $validateData['status'] = $request->status == true ? '1' : '0';
        if( $request->hasFile('image') ){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move($this->uploadPath, $filename);
            $validateData['image'] = $this->uploadPath.$filename;
        }
        Slider::create($validateData);
        return redirect('admin/slider')->with('message', 'Thêm mới slide thành công');
    }

    public function edit(Slider $slider){
        return view('admin.slider.edit', compact('slider'));
    }

    public function update(SliderFormRequest $request, Slider $slider){
        $validateData = $request->validated();
        $validateData['status'] = $request->status == true ? '1' : '0';
        if( $request->hasFile('image') ){
            if( File::exists($slider->image) ){
                File::delete($slider->image);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move($this->uploadPath, $filename);
            $validateData['image'] = $this->uploadPath.$filename;
        }
        Slider::find($slider->id)->update($validateData);
        return redirect('admin/slider')->with('message', 'Sửa slide thành công');
    }

    public function delete(Slider $slider){
        if( File::exists($slider->image) ){
            File::delete($slider->image);
        }
        $slider->delete();
        return redirect('admin/slider')->with('message', 'Xóa slide thành công');
    }
}
