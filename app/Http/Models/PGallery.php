<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PGallery extends Model
{
    use SoftDeletes;

	protected $dates = ['deleted_at'];
	protected $table = 'product_gallery';
	protected $hidden = ['created_at', 'updated_at'];
}
