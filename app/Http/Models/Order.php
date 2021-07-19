<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $dates = ['deleted_at'];
	protected $table = 'orders';
	protected $hidden = ['created_at', 'updated_at'];

	public function getItems(){
		return $this->hasMany(OrderItem::class, 'order_id', 'id')->whereNull('discount_until_date')->orWhere(function($query){$query->where('discount_until_date', '>=', date('Y-m-d'));})->with(['getProduct']);
	}

	public function getUserAddress(){
		return $this->hasOne(UserAddress::class, 'id', 'user_address_id');
	}

	public function getSubtotal(){
		return $this->hasMany(OrderItem::class, 'order_id', 'id')->whereNull('discount_until_date')->orWhere(function($query){$query->where('discount_until_date', '>=', date('Y-m-d'));})->sum('total');
	}

	public function getUser(){
		return $this->hasOne('App\Models\User', 'id', 'user_id');
	}
}
