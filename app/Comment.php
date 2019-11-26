<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Comment extends Model
{
	
	use SoftDeletes;
	
	protected $dates = ['deleted_at'];

	protected $guarder = [];

	public function posts()
	{
		return $this->belongsTo(Post::class);
	}
}
