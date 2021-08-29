<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Models\Category, App\Http\Models\Product, App\Http\Models\PGallery, App\Http\Models\Inventory, App\Http\Models\Variant;

use Validator, Str, Config, Image;

class ProductController extends Controller
{
    public function __Construct(){
    	$this->middleware('auth');
        $this->middleware('user.status');
    	$this->middleware('isadmin');
    }

    public function getHome($status){
        switch ($status) {
            case '0':
                $products = Product::with(['cat', 'getSubcategory'])->where('status', '0')->orderBy('id', 'desc')->paginate(25);
                break;
            case '1':
                $products = Product::with(['cat', 'getSubcategory'])->where('status', '1')->orderBy('id', 'desc')->paginate(25);
                break;
            case 'all':
                $products = Product::with(['cat', 'getSubcategory'])->orderBy('id', 'desc')->paginate(25);
                break;
            case 'trash':
                $products = Product::with(['cat', 'getSubcategory'])->onlyTrashed()->orderBy('id', 'desc')->paginate(25);
                break;
        }
        $data = ['products' => $products];
    	return view('admin.products.home', $data);
    }

    public function getProductAdd(){
        $cats = Category::where('module', '0')->where('parent', '0')->pluck('name', 'id');
        $data = ['cats' => $cats];
    	return view('admin.products.add', $data);
    }

    public function postProductAdd(Request $request){
        $rules = [
            'name' => 'required|unique:products,name',
            'img' => 'required',
            'content' => 'required'
        ];

        $messages = [
            'name.required' => 'El nombre del producto es requerido',
            'name.unique' => 'El nombre del producto debe ser unico',
            'img.required' => 'Seleccione una imagen destacada',
            'img.image' => 'El archivo no es una imagen',
            'content.required' => 'Ingrese una descripcion del producto'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message', 'Se ha producido un error.')->with('typealert', 'danger')->withInput();
        else:
            
            $product = new Product;
            $product->status = '0';
            $product->code = e($request->input('code'));
            $product->name = e($request->input('name'));
            $product->slug = Str::slug($request->input('name'));
            $product->category_id = $request->input('category');
            $product->subcategory_id = $request->input('subcategory');
            $product->image = $this->postFileUpload('img', $request, [[256,256,'256x256']]);
            $product->in_discount = $request->input('indiscount');
            $product->discount = $request->input('discount');
            $product->content = e($request->input('content'));

            if($product->save()):
                return redirect('/admin/product/'.$product->id.'/edit')->with('message', 'Guardado con éxito.')->with('typealert', 'success');
            endif;
        endif;

    }

    public function getProductEdit($id){
        $p = Product::findOrFail($id);
        $cats = Category::where('module', '0')->where('parent', '0')->pluck('name', 'id');
        $data = ['cats' => $cats, 'p' => $p];
        return view('admin.products.edit', $data);
    }

    public function postProductEdit($id, Request $request){
        $rules = [
            'name' => 'required',
            'content' => 'required'
        ];

        $messages = [
            'name.required' => 'El nombre del producto es requerido',
            'img.image' => 'El archivo no es una imagen',
            'price.required' => 'Ingrece el precio del producto',
            'content.required' => 'Ingrese una descripcion del producto'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message', 'Se ha producido un error.')->with('typealert', 'danger')->withInput();
        else:
            
            $product = Product::findOrFail($id);
            $ipp = $product->file_path;
            $ip = $product->image;
            $product->status = $request->input('status');
            $product->code = e($request->input('code'));
            $product->name = e($request->input('name'));
            $product->category_id = $request->input('category');
            $product->subcategory_id = $request->input('subcategory');
            if($request->hasFile('img')):
                $actual_image = $product->image;
                if(!is_null($product->image)):
                    $this->getFileDelete('uploads', $actual_image, ['256x256', '328x328']);
                endif;
                $product->image = $this->postFileUpload('img', $request, [[256,256,'256x256']]);
            endif;
            $product->in_discount = $request->input('indiscount');
            $product->discount = $request->input('discount');
            $product->discount_until_date = $request->input('discount_until_date');
            $product->content = e($request->input('content'));

            if($product->save()):
                $this->getUpdateMinPrice($product->id);
                return back()->with('message', 'Actualizado con éxito.')->with('typealert', 'success');
            endif;
        endif;
    }

    public function postProductGalleryAdd($id, Request $request){
        $rules = [
            'file_image' => 'required'
        ];

        $messages = [
            'file_image.required' => 'Seleccione una imagen'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message', 'Se ha producido un error.')->with('typealert', 'danger')->withInput();
        else:
            if($request->hasFile('file_image')):

                $g = new PGallery;
                $g->product_id = $id;
                $g->file_name = $this->postFileUpload('file_image', $request, [[256,256,'256x256']]);
                if($g->save()):
                    return back()->with('message', 'Imagen subida con éxito.')->with('typealert', 'success');
                endif;

            endif;
            
        endif;
    }

    function getProductGalleryDelete($id, $gid){
        $g = PGallery::findOrFail($gid);
        if($g->product_id != $id){
            return back()->with('message', 'La Imagen no se puede eliminar.')->with('typealert', 'danger');
        }else{
            if($g->delete()):
                return back()->with('message', 'Imagen borrada con éxito.')->with('typealert', 'success');
            endif;
        }
    }

    public function postProductSearch(Request $request){
        $rules = [
            'search' => 'required'
        ];

        $messages = [
            'search.required' => 'El campo consulta es requerido.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return redirect('/admin/products/1')->withErrors($validator)->with('message', 'Se ha producido un error.')->with('typealert', 'danger')->withInput();
        else:
            switch ($request->input('filter')):
                case '0':
                    $products = Product::with(['cat'])->where('name', 'LIKE',  '%'.$request->input('search').'%')->where('status', $request->input('status'))->orderBy('id', 'desc')->get();
                    break;
                case '1':
                    $products = Product::with(['cat'])->where('code', $request->input('search'))->orderBy('id', 'desc')->get();
                    break;
            endswitch;

            $data = ['products' => $products];
        return view('admin.products.search', $data);
        endif;
    }

    public function getProductDelete($id){
         $p = Product::findOrFail($id);
         if($p->delete()):
            return back()->with('message', 'Producto enviado a la papelera de reciclaje.')->with('typealert', 'success');
        endif;
    }
    public function getProductRestore($id){
         $p = Product::onlyTrashed()->where('id', $id)->first();
         if($p->restore()):
            $p->status = "0";
            $p->save();
            return redirect('/admin/product/'.$p->id.'/edit')->with('message', 'Este producto se restauro con éxito.')->with('typealert', 'success');
        endif;
    }

    public function getProductInventory($id){
        $product = Product::findOrFail($id);
        $data = ['product' => $product];
        return view('admin.products.inventory', $data);
    }

    public function postProductInventory($id, Request $request){
        $rules = [
            'name' => 'required',
            'price' => 'required',
        ];

        $messages = [
            'name.required' => 'El nombre del inventario es requerido',
            'price.required' => 'Ingrece el precio del inventario'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message', 'Se ha producido un error.')->with('typealert', 'danger')->withInput();
        else:
            $inventory = new Inventory;
            $inventory->product_id = $id;
            $inventory->name = e($request->input('name'));
            $inventory->quantity = $request->input('inventory');
            $inventory->price = $request->input('price');
            $inventory->limited = $request->input('limited');
            $inventory->minimum = $request->input('minimum');
            if($inventory->save()):
                $this->getUpdateMinPrice($inventory->product_id);
                return back()->with('message', 'Guardado con éxito.')->with('typealert', 'success');
            endif;
        endif;
    }

    public function getProductInventoryEdit($id){
        $inventory = Inventory::findOrFail($id);
        $data = ['inventory' => $inventory];
        return view('admin.products.inventory_edit', $data);
    }

    public function postProductInventoryEdit($id, Request $request){
         $rules = [
            'name' => 'required',
            'price' => 'required',
        ];

        $messages = [
            'name.required' => 'El nombre del inventario es requerido',
            'price.required' => 'Ingrece el precio del inventario'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message', 'Se ha producido un error.')->with('typealert', 'danger')->withInput();
        else:
            $inventory = Inventory::find($id);
            $inventory->name = e($request->input('name'));
            $inventory->quantity = $request->input('inventory');
            $inventory->price = $request->input('price');
            $inventory->limited = $request->input('limited');
            $inventory->minimum = $request->input('minimum');
            if($inventory->save()):
                $this->getUpdateMinPrice($inventory->product_id);
                return back()->with('message', 'Guardado con éxito.')->with('typealert', 'success');
            endif;
        endif;
    }

    public function getProductInventoryDeleted($id){
         $inventory = Inventory::findOrFail($id);
         if($inventory->delete()):
            $this->getUpdateMinPrice($inventory->product_id);
            return back()->with('message', 'Inventario eliminado.')->with('typealert', 'success');
        endif;
    }

    public function postProductInventoryVariantAdd($id, Request $request){
        $rules = [
            'name' => 'required'
        ];

        $messages = [
            'name.required' => 'El nombre de la variante es requerido'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message', 'Se ha producido un error.')->with('typealert', 'danger')->withInput();
        else:
            $inventory = Inventory::findOrFail($id);

            $variant = new Variant;
            $variant->product_id = $inventory->product_id;
            $variant->inventory_id = $id;
            $variant->name = e($request->input('name'));
            if($variant->save()):
                return back()->with('message', 'Guardado con éxito.')->with('typealert', 'success');
            endif;
        endif;
    }

    public function getProductInventoryVariantDeleted($id){
         $variant = Variant::findOrFail($id);
         if($variant->delete()):
            return back()->with('message', 'Variante eliminada.')->with('typealert', 'success');
        endif;
    }

    public function getUpdateMinPrice($id){
        $product = Product::find($id);
        $price = $product->getPrice->min('price');

        $product->price = $price;
        $product->save();
    }
}
