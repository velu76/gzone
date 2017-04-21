<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
	protected $fillable = ['name', 'user_id'];

    //
    public function users() 
    {
    	return $this->belongsToMany(User::class);
    }

    public function files() 
    {
    	return $this->hasMany(File::class);
    }
}
