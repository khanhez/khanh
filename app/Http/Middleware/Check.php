<?php

namespace App\Http\Middleware;

use Closure;
use DB;
use App\Role;
use App\Permission;
use App\User;
class Check
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next ,$permission = null)
    {
         $list = DB::table('users')
             ->join('role_user', 'users.id', '=', 'role_user.user_id')
             ->join('roles', 'role_user.role_id', '=', 'roles.id')
             ->where('users.id',auth()->id())
             ->select('roles.*')
             ->get()->pluck('id')->toArray();
            $list = DB::table('roles')
             ->join('role_permission', 'roles.id', '=', 'role_permission.role_id')
             ->join('permissions', 'role_permission.permission_id', '=', 'permissions.id')
            ->whereIn('roles.id',  $list)
             ->select('permissions.*')
             ->get()->pluck('id')->unique();
             
             //
             $checkpermission = Permission::where('name', $permission)->value('id');   
             if ($list->contains($checkpermission)) {
                 return $next($request);
             }
             return abort(401);
    }
}
