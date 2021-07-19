<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Models\Category;

class ApiController extends Controller
{
    public function __Construct(){
    	$this->middleware('auth');
    	$this->middleware('isadmin');
    }

    public function getSubCategories($parent){
    	$categories = Category::where('parent', $parent)->get();
    	return response()->json($categories);
    }
}
