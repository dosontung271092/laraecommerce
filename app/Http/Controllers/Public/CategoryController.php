<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::where('status', '0')->get();
        return view('public.category.index', compact('categories'));
    }
}
