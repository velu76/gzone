<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
	protected $fillable = ['name', 'active_from', 'active_till', 'created_at', 'updated_at'];

    //
    public function users() 
    {        
    	return $this->belongsToMany(User::class);
    }

    public function members() 
    {
        
        return $this->belongsToMany(Member::class);           

    }

    public function managers() 
    {
        
        return $this->belongsToMany(User::class);
    }


    public function files() 
    {
    	return $this->hasMany(File::class);
    }
}
