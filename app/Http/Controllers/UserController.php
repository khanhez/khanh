<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Role;
use App\Permission;
use App\User;
use App\Http\Requests\UserRequest;
use App\Repositories\User\UserEloquentRepository;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    protected $userRepo;

    public function __construct(UserEloquentRepository $userRepo)
    {

        return $this->userRepo= $userRepo;

    }

    public function index()

    {
        $data['user'] = $this->userRepo->getAll();

        return view('admin.User.listuser',$data);

    }

    public function create()

    {
        $datas['roles'] = Role::all();

        return view('admin.User.adduser',$datas);

    }

    public function store(UserRequest $request)

    {
      
        $this->userRepo->create($request);

        return redirect()->route('createuser')->with('thongbao','Bạn đã thêm thành công');

    }

    public function edit($id){
        
        $datas = $this->userRepo->find($id);

        return view('admin.User.edituser',$datas);

    }

    public function update(Request $request,$id)

    {  
      
         $user= $this->userRepo->update($id,$request);

         return redirect()->route('edituser',$id)->with('thongbao','Update thành công tài khoản'); 

    }

    public function delete($id)

    {

        $user=$this->userRepo->delete($id);

        return redirect()->route('listuser');

    }   
}
