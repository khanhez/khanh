<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Role;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function roles()
    {
      return $this->belongsToMany(Role::class,'role_user');
    }
    public function posts()
    {
        return $this->hasMany(Post::class);
    }   
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function hasRole($role) //khi phân quyền bằng gate thì phải có hasrole để sau Gate:define ở AuthServiceProvider,nếu không có thì không phân quyền được
    {
        if(is_string($role))
        {
            return $this->roles->contains('name', $role);
        }
      return !! $role->intersect($this->roles)->count();
    }
}
