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
  return $this->belongsToMany('App\Permission' , 'role_permission');//vi y/c p dung truoc r,nen khai báo nguocj,nêm phải thêm role_permission trog mối quan hệ nhiều nhiều,chú ý
  
}
public function users()
{
 return $this->belongsToMany(User::class,'role_user');
}
}
