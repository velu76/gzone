<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
	protected $fillable = ['name', 'user_id'];

    //
    public function owner() 
    {
    	return $this->belongsTo(User::class, 'user_id');
    }

    public function files() 
    {
    	return $this->hasMany(File::class);
    }
}
