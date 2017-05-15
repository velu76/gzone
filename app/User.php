<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;
use Illuminate\Support\Facades\DB;
use App\Role;
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

    public function updateRelation($roles,$id){
      $table = "";
      foreach($roles as $role) {
        switch($role)
        {
          // Admin
          case 1:
            $this->attachRole(Role::find(1));
            break;

          // Manager  
          case 2:
            $manager = array('manager_id' => $id);
            DB::table('manager_user')->insert($manager);
            $this->attachRole(Role::find(2));
            break;

          // Member  
          case 3:
            $member = array('member_id' => $id);
            DB::table('member_user')->insert($member);
            $this->attachRole(Role::find(3));
            break;

          default:
            break;
        }  
      }
      
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
