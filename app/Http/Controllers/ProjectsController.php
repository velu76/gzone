<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\User;
use Yajra\Datatables\Datatables;

class ProjectsController extends Controller
{
    //
    public function index() 
    {
    	return view('projects.index');
    }

    public function edit(Project $project) 
    {
    	$users = User::all();    	
    	return view('projects.edit', compact('project','users'));
    }

    public function update(Project $project) 
    {
    	$req = request()->all();    	
    	$project->update($req);
    	return redirect(route('projects_index'));
    }

    public function pData()     	
    {    	
    	$projects = Project::select(['id','name','user_id','created_at','updated_at']);
    	return Datatables::of($projects)
    				->editColumn('user_id', function($project){
    					return title_case($project->owner->name);	
    				})
    				->editColumn('created_at', function($project){
    					return $project->created_at->toDayDateTimeString();
    				})
    				->editColumn('updated_at', function($project){
    					return $project->created_at->toDayDateTimeString();
    				})	
    				->addColumn('action', function($project){
    					$btns = "<a href='". route('project_edit', $project->id) ."' class='btn btn-xs btn-primary'>Edit</a>";
    					$btns .=  "<a href='#' class='btn btn-xs btn-danger'>Delete</a>";
    					return $btns;    					
    				})
    				->make(true);
    }
}
