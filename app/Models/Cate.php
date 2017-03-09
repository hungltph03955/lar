<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cate extends Model
{
	protected $table = 'qt64_category';

	protected $fillable = ['id','name','slug','parent_id','created_at'];
}
