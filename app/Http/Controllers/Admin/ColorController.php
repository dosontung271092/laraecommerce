<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ColorFormRequest;
use Illuminate\Http\Request;
use App\Models\Color;

class ColorController extends Controller
{

    public function index(){
        $colors = Color::all();
        return view('admin.color.index', compact('colors'));
    }

    public function create(){

        return view('admin.color.create');
    }

    public function store(ColorFormRequest $request){
        $validateData = $request->validated();
        $validateData['status'] = $request->status == true ? '1' : '0';
        Color::create($validateData);
        return redirect('admin/color')->with('message', 'Color added successfully');
    }

    public function edit(Color $color){
        return view('admin.color.edit', compact('color'));
    }

    public function update(ColorFormRequest $request, $id){
        $validateData = $request->validated();
        $validateData['status'] = $request->status == true ? '1' : '0';
        Color::find($id)->update($validateData);
        return redirect('admin/color')->with('message', 'Color updated successfully');
    }

    public function delete($id){
        $color = Color::findOrFail($id);
        $color->delete();
        return redirect('admin/color')->with('message', 'Color deleted successfully');
    }
}
