<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Validator, Str, Config;

use App\Http\Models\Category;
use App\Http\Models\Product;
use App\Http\Models\OrderItem;

class CategoriesController extends Controller
{
    public function __Construct(){
    	$this->middleware('auth');
        $this->middleware('user.status');
    	$this->middleware('isadmin');
    }

    public function getHome($module){
    	$cats = Category::where('module', $module)->where('parent', '0')->orderBy('order', 'Asc')->get();
    	$data = ['cats' => $cats, 'module' => $module];
    	return view('admin.categories.home', $data);
    }

    public function postCategoryAdd(Request $request, $module){
    	$rules = [
    		'name' => 'required',
    	];
    	$messages = [
    		'name.required' => 'Se require de un nombre para la categoria'
    	];

    	$validator = Validator::make($request->all(), $rules, $messages);
    	if($validator->fails()):
    		return back()->withErrors($validator)->with('message', 'Se ha producido un error.')->with('typealert', 'danger');
    	else:
            /*
            $upload_icon = $this->postFileUpload('icon', $request);
            $icon = json_decode($upload_icon, true);
            if($icon['upload'] == "error"):
                return back()->with('message', 'No se pudo subir el archivo.')->with('typealert', 'danger');
            endif;
            */
    		$c = new Category;
    		$c->module = $module;
    		$c->parent = $request->input('parent');
    		$c->name = e($request->input('name'));
    		$c->slug = Str::slug($request->input('name'));
    		if($c->save()):
    			return back()->with('message', 'Guardado con éxito.')->with('typealert', 'success');
    		endif;
    	endif;
    }

    public function getCategoryEdit($id){
        $cat = Category::find($id);
        $data = ['cat' => $cat];
        return view('admin.categories.edit', $data);
    }

    public function postCategoryEdit(Request $request, $id){
        $rules = [
            'name' => 'required',
        ];
        $messages = [
            'name.required' => 'Se require de un nombre para la categoria',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message', 'Se ha producido un error.')->with('typealert', 'danger');
        else:

            $c = Category::find($id);
            $c->name = e($request->input('name'));
            $c->slug = Str::slug($request->input('name'));
            $c->order = $request->input('order');
            if($c->save()):
                return back()->with('message', 'Guardado con éxito.')->with('typealert', 'success');
            endif;
        endif;
    }

    public function getSubCategories($id){
    	$cat = Category::findOrFail($id);
    	$data = ['category' => $cat];
    	return view('admin.categories.subs_categories', $data);
    }

    public function getCategoryDelete($id){

        $c = Category::find($id);
        $p = Product::where('category_id', $c->id)->orderBy('id', 'Desc')->get();
        $po = OrderItem::where('category_id', $c->id)->get();
        if(count($p) > 0){
            return back()->with('message', 'No se puede borrar Categorias con Productos')->with('typealert', 'danger');
        }else if(count($po) > 0){
            return back()->with('message', 'No se puede borrar Categorias con Ordenes realizadas')->with('typealert', 'danger');
        }else{
            if($c->delete()):
                return back()->with('message', 'Borrado con éxito.')->with('typealert', 'success');
             endif;
        }
    }
}
