<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\User;
use Yajra\Datatables\Datatables;

class ProjectsController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth');
    }

    //
    public function index() 
    {
    	return view('projects.index');
    }

    public function create() 
    {
        $users = User::all();   
        return view('projects.create',compact('users'));
    }

    public function store(Request $req) 
    {
        $this->validate($req, [
            'name'    => 'required|min:4|max:200',
            'user_id' => 'required|exists:users,id'
        ]);                     

        $project = Project::create(array('name'=> $req['name']));
        $project->owner()->attach($req['user_id']);
        return redirect(route('projects_index'));

    }

    public function edit(Project $project) 
    {
    	$users = User::all();    	
    	return view('projects.edit', compact('project','users'));
    }

    public function update(Project $project) 
    {
    	$this->validate(request(), [
            'name'    => 'required|min:4|max:200',
            'user_id' => 'required|exists:users,id'
        ]);
    	$project->update(request()->all());
    	return redirect(route('projects_index'));
    }

    public function pData()     	
    {    	
    	$projects = Project::select(['id','name','active_from','active_till']);

    	return Datatables::of($projects)
    				->editColumn('user_id', function($project){                        
    					return title_case($project->users()->pluck('name'));	
    				})
    				->editColumn('active_from', function($project){                        
                        dd($project->active_from->toDayDateTimeString());
    					return $project->active_from->toDayDateTimeString();
    				})
    				->editColumn('active_till', function($project){
    					return $project->active_till->toDayDateTimeString();
    				})	
    				->addColumn('action', function($project){
    					$btns = "<a href='". route('project_edit', $project->id) ."' class='btn btn-xs btn-primary'>Edit</a>";
    					$btns .=  "<a href='#' class='btn btn-xs btn-danger'>Delete</a>";
    					return $btns;    					
    				})
    				->make(true);
    }
}
