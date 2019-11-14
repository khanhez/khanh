<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Permission;
class Role extends Model
{
 protected $table = 'roles';
 
 protected $primaryKey = 'id';
 protected $guarded = [];
 public function permissions()
 {
  return $this->belongsToMany(Permission::class , 'role_permission');
}
public function users()
{
 return $this->belongsToMany(User::class,'role_user');
}
}
