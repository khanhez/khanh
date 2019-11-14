<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
	protected $table = 'permissions';
    //
	protected $primarykey = 'id';
	protected $guarded =[];
	public function roles()
	{
		return $this->belongsToMany(Role::class , 'role_permission');
	}
}
