<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Taxonomy;

class TaxonomyController extends Controller
{
    public function index(){

        $taxonomies = Taxonomy::where('status', '0')->get();
        return view('public.taxonomy.index', compact('taxonomies'));
    }
}
