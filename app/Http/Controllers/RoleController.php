<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use App\Role;
use App\Permission;
class RoleController extends Controller
{
  private $role;
  public function __construct(Role $role)
  {
    $this->role=$role;
  }
  public function index()
  {
    $data['role'] = Role::paginate(2);
    return view('admin.Role.listrole',$data);
  }
  public function create()
  {
    $datas['permissions'] = Permission::all();
    return view('admin.Role.themrole',$datas);
  }
  public function store(Request $request)
  {


    $role = new  Role;
    $role->name= $request->name;
    $role->display_name = $request->display_name;
    
    $role->save();

          // $role->permissions()->attach($request->permission);
    
    $role->permissions()->attach($request->permission);
    
    return redirect()->route('list.role');
  }
  public function edit($id)
  {


    $data['role'] = Role::find($id);
    $data['permissions'] = Permission::all();
    $data['allPermision'] = DB::table('role_permission')->where('role_id',$id)->pluck('permission_id');
    return view('admin.Role.suarole',$data);
  }
  public function update(Request $request,$id)
  {

          // $role = Role::find($id);
          // $role->name= $request->name;
          // $role->display_name = $request->display_name;

          // $role->save();
    $this->role->where('id',$id)->update([
      'name' =>$request->name,
      'display_name'=>$request->display_name
    ]);
          // $role->permissions()->attach($request->permission);
    DB::table('role_permission')->where('role_id',$id)->delete();
    $role = Role::find($id);

    $role->permissions()->attach($request->permissions);


    return redirect()->route('list.role');

    
    
  }
  public function delete($id)
  {

    $role = Role::find($id);
    $role->destroy($id);


    $role->permissions()->detach();

    return redirect()->route('list.role');
    
  }
}