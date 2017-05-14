<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;
use Project;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    public function projects() 
    {
      return $this->belongsToMany(Project::class); 
    }


    public function getAllPermissions()
    {
        $permissions = [];
    
        foreach($this->roles as $role) {
            foreach($role->permissions as $permission) {
                $permissions[] = $permission->name;                
            }
        }
        return array_unique($permissions);
    }


    public function getAllRoles()
    {
        $roles = [];
    
        foreach($this->roles as $role) {
            $roles[] = $role->display_name;                
            
        }
        return array_unique($roles);
    }


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
