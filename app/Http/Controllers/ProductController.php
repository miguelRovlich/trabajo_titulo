<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Models\Product;

class ProductController extends Controller
{
    public function getProduct($id, $slug){
    	$product = Product::findOrFail($id);
    	//$product = Product::where('id', $id)->where('slug', $slug)->first();
    	$data = ['product' => $product];
    	return view('product.product_single', $data);
    }
}
