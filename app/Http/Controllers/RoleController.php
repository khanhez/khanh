<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use App\Role;
use App\Permission;
use App\Repositories\Role\RoleEloquentRepository;
use App\Http\Requests\RoleRequest;
class RoleController extends Controller
{

      protected $roleRepo;

      private $role;

      private $permission;

      public function __construct(Role $role, Permission $permission,RoleEloquentRepository $roleRepo )

      {
          $this->role=$role;

          $this->permission=$permission;

          $this->roleRepo=$roleRepo;
      }

      public function index()
      {

          $data['role'] = $this->roleRepo->getAll();

          return view('admin.Role.listrole',$data);

      }

      public function create()
      {

          $datas['permissions'] = $this->permission::all();

          return view('admin.Role.addrole',$datas);

      }

      public function store(RoleRequest $request)

      {
    
          $this->roleRepo->create($request);

          return redirect()->route('listrole')->with('thongbao','Thêm quyền thành công');

      }

      public function edit($id) 
      {

          $data=$this->roleRepo->find($id);

          return view('admin.Role.editrole',$data);

      }

      public function update(RoleRequest $request,$id)

      {
         
          $RoleCreate = $this->roleRepo->update($id, $request);
          
          return redirect()->route('listrole',$id)->with('thongbao','Update thanh công quyền');

      }

      public function delete($id)
      {

          $this->roleRepo->delete($id);

          return redirect()->route('listrole');

      }

}