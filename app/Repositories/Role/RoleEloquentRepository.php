<?php
namespace App\Repositories\Role;

use App\Repositories\EloquentRepository;
use App\Role;
use App\Permission;
use Illuminate\Support\Facades\DB;

class RoleEloquentRepository extends EloquentRepository
{

	public function getModel()

	{

		  return \App\Role::class;
	}

	public function getAll()
	{

		  return \App\Role::with('permissions','users')->get();

	}
	public function delete($id)
	{

		  $role = Role::find($id);
          $role->destroy($id);
          $role->permissions()->detach();
          return $role;
	}
	public function find($id)
	{
		  $data['permissions']=Permission::all();
  		  $data['role'] = Role::find($id);
          // lấy ra tất cả các quyền có trong checkbox
  		  $data['getAllPermissionRole'] =DB::table('role_permission')->where('role_id',$id)->pluck('permission_id');
 		  return $data;
	}
	public function create($attributes)
	{

		  $roleCreate = Role::create([
      		'name' => $attributes->name ,
      		'display_name' => $attributes->display_name
      	     ]);
    	  $roleCreate->permissions()->attach($attributes->permission);
    	  return  $roleCreate;
	}
	public function update($id,$attributes)
	{
		Role::where('id',$id)->update([
          'name' => $attributes->name,
          'display_name' => $attributes->display_name
          
          ]);
          // update bang trung gian role_permission
          DB::table('role_permission')->where('role_id',$id)->delete();

          $RoleCreate=Role::find($id);

          $RoleCreate->permissions()->attach($attributes->permission);

          return $RoleCreate;
	}
	
}
?>