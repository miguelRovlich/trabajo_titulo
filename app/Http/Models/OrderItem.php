<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    protected $dates = ['deleted_at'];
	protected $table = 'orders_items';
	protected $hidden = ['created_at', 'updated_at'];

	public function getProduct(){
		return $this->hasOne(Product::class, 'id', 'product_id');
	}
}
