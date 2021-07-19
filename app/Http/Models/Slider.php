<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table = 'sliders';
	protected $hidden = ['created_at', 'updated_at'];
}
