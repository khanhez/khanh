<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	protected $table = 'posts' ;
	protected $fillable =['title','img','content','user_id'];

	public function comments()
	{
		return $this->hasMany(Comment::class);
	}
	public function user()
	{
		return $this->belongsTo(User::class);
		//mỗi post thuộc về 1 user
	}
	
}
