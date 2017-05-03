<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Project;

class Member extends Authenticatable
{
    public function projects() 
    {
    	if ($this->hasRole('member'))
    		return $this->belongsToMany(Project::class);
    }
}
