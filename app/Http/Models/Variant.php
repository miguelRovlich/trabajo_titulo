<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Variant extends Model
{
    use HasFactory;
    use SoftDeletes;

	protected $dates = ['deleted_at'];
	protected $table = 'product_inventory_variants';
	protected $hidden = ['created_at', 'updated_at'];
}
