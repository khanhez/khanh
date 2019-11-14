<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Role;
use App\Permission;
use App\User;
class UserController extends Controller
{
    public function index()
    {
    	$data['user'] = User::paginate(4);
    	return view('admin.User.listuser',$data);
    }
    public function create()
    {
        $datas['roles'] = Role::all();
        return view('admin.User.themuser',$datas);
    }
    public function store(Request $request)
    {
        $this->validate($request,
            [
                'name'=>'required',
                'email'=>'required',
                'password'=>'required'
            ],
            [
                'name.required' => 'Bạn chưa nhập name',
                'email.required' =>'Bạn chưa nhập email',
                'password.required'=>'Bạn chưa nhập password'
            ]);
        $user = new User;
        $user->name= $request->name;
        $user->email =$request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        $roles=$request->roles;
        foreach($roles as $ro){
            DB::table('role_user')->insert([
                'user_id'=>$user->id,
                'role_id'=>$ro
            ]);

        };

        return redirect()->route('listuser');


    }
    public function edit($id)
    {
    	$datas['roles'] =Role::all();
    	$datas['user'] =User::find($id);
    	$datas['list'] = DB::table('role_user')->where('user_id',$id)->pluck('role_id');
    	return view('admin.User.suauser',$datas);
    }
    public function update(Request $request,$id)
    {  
        $this->validate($request,
            [
                'name' => 'required',
                'email'=>'required',
                'password'=> 'required'
            ],
            [
                'name.required'=>'Bạn chưa nhập name',
                'email.required' => 'Bạn chưa nhập email',
                'password.required'=>'Bạn chưa nhập password'
            ]);
        $user= User::find($id);
        $user->name= $request->name;
        $user->email=$request->email;
        $user->save();
        DB::table('role_user')->where('user_id',$id)->delete();
        $userCre= User::find($id);
        $userCre->roles()->attach($request->roles); //xóa 1 hoặc nhiều recol trong bảng,khi update user xóa role cũ và update role mới
        return redirect()->route('listuser'); 


    }
    public function delete($id)
    {
    	$user = User::find($id);
        $user->destroy($id);
        $user->roles()->detach();
        return redirect()->route('listuser');
    }	
}
