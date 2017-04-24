<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    // Only authenticated users can access these services
    public function __construct() 
    {
    	$this->middleware('auth');
    }

    // Main Page listing all the users
    public function index() 
    {
    	return view('users.index');
    }

    // Ajax call handler for Users table data
    public function uData() 
    {
    	$users = User::select(['id', 'name', 'email']);

        return DataTables::of($users)
                    ->addColumn('permission', function($user) {
                       return $user->           
                    })
    	
    }

}
