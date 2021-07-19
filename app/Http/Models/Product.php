<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

	protected $dates = ['deleted_at'];
	protected $table = 'products';
	protected $hidden = ['created_at', 'updated_at'];

	public function cat(){
		return $this->hasOne(Category::class, 'id', 'category_id')->withTrashed();
	}

	public function getSubcategory(){
		return $this->hasOne(Category::class, 'id', 'subcategory_id');
	}

	public function getGallery(){
		return $this->hasMany(PGallery::class, 'product_id', 'id');
	}

	public function getInventory(){
		return $this->hasMany(Inventory::class, 'product_id', 'id')->orderBy('price', 'Asc');
	}

	public function getPrice(){
		return $this->hasMany(Inventory::class, 'product_id', 'id');
	}
}
