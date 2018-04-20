<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;


    public function roles()
    {
        return $this->belongsToMany('App\Models\Role','user_role');
    }

    public function hasRole($rolename)
    {
        foreach ($this->roles as $role) if($rolename == $role->name) return true;
        return false;
    }


    protected $fillable = [
        'name', 'email', 'password',
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];
}
