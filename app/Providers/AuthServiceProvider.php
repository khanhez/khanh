<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use  App\Post;
use App\Permission;
class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot() //model user khởi tạo hasRole và có protected function getPermissions() dể foreach
    {

        $this->registerpolicies();
        foreach ($this->getPermissions()  as $permission )
        {
            Gate::define($permission->name, function($user)  use ($permission){
                return $user->hasRole($permission->roles);
            }); 
        } 


    }
    protected function getPermissions()
    {
     return Permission::with('roles')->get();
    }

}
