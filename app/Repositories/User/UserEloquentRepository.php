<?php
namespace App\Repositories\User;

use App\Repositories\EloquentRepository;
use App\Role;
use App\User;
use Illuminate\Support\Facades\DB;
class UserEloquentRepository extends EloquentRepository
{
	public function getModel()
	{
		return \App\User::class;
		return \App\Role::class;
	}
	public function getAll()
	{
		return \App\User::with('roles','posts')->get();
	}
	public function find($id)
	{
		$datas['roles'] =Role::all();
    	$datas['user'] =User::find($id);
    	$datas['list'] = DB::table('role_user')
        ->where('user_id',$id)
        ->pluck('role_id');
		return    $datas;
	}
	public function create($attributes)
	{
		$user = User::create($attributes->all());
		$roles=$attributes->roles;
        foreach($roles as $ro){
        DB::table('role_user')->insert([
                'user_id'=>$user->id,
                'role_id'=>$ro
        ]);

        };
        return $user;
	}
	public function update($id,$attributes)
	{
		$user= User::find($id);

        $user->name= $attributes->name;

        $user->email=$attributes->email;

        $user->save();

        DB::table('role_user')->where('user_id',$id)->delete();

        $userCre= User::find($id);

        $userCre->roles()->attach($attributes->roles);
        return $user;
	}
	public function delete($id)
	{
		$user = User::find($id);
        $user->destroy($id);
        $user->roles()->detach();

        return $user;
	}
}
?>