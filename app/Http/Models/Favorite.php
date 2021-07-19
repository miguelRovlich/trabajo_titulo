<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;
    protected $dates = ['deleted_at'];
	protected $table = 'user_favorites';
	protected $hidden = ['created_at', 'updated_at'];
}
