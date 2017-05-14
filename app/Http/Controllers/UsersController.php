<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;


class UsersController extends Controller
{
    protected $user_password;

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

    public function create() 
    {
      $roles = Role::all();
      return view('users.create', compact('roles'));
    }

    public function store(Request $req) 
    {        
        $this->validate($req, [
            'name'    => 'required|min:4|max:200',
            'email'   => 'required|email|confirmed',            
            'role_id' => 'required|exists:roles_id'
        ]);

        $vfrom = Carbon::createFromFormat("m/d/Y h:i a",$req['active_from']);
        $vtill = Carbon::createFromFormat('m/d/Y h:i a',$req['active_till']);        
        
        $this->user_password="";
        $this->user_password="TestPassword@2017";

        $user_data = array('name'=> $req['name'], 'password' => $this->user_password );
        $user_type_data = array('name'=> $req['name'], 'active_from' => $vfrom, 'active_till' => $vtill, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() );
        $project = Project::create($pdata);        
        $project->users()->attach($req['user_id'], ['active_from' => $vfrom, 'active_till' => $vtill]);
        return redirect(route('projects_index'));

    }

    // Ajax call handler for Users table data
    public function uData() 
    {
    	$users = User::select(['id', 'name', 'email']);

        return DataTables::of($users)
                ->addColumn('permission', function($user){
                    return $user->getAllRoles();
                })
                ->addColumn('valid', function(){
                    return "Today";
                })
                ->make(true);              
    	
    }

}
