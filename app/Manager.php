<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Project;


class Manager extends Authenticatable
{
 	public function projects() 
    {
    	return $this->belongsToMany(Project::class);
    }
}
