<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\User;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;

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

        $vfrom = Carbon::createFromFormat("m/d/Y h:i a",$req['active_from']);
        $vtill = Carbon::createFromFormat('m/d/Y h:i a',$req['active_till']);        
        

        $pdata = array('name'=> $req['name'], 'active_from' => $vfrom, 'active_till' => $vtill, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() );
        $project = Project::create($pdata);        
        $project->users()->attach($req['user_id'], ['active_from' => $vfrom, 'active_till' => $vtill]);
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

    public function destroy(Project $project) 
    {
        $project->delete();
        return redirect(route('projects_index')); 
    }

    public function pData()     	
    {    	
    	$projects = Project::select(['id', 'name', 'active_from', 'active_till', 'created_at']);

    	return Datatables::of($projects)
    				->editColumn('user_id', function($project){                        
                        $users =  $project->users()->pluck('name');
                        $b_list= "";
                        foreach($users as $user) {
                            $b_list .= title_case($user). ", ";
                        }
                        $b_list = rtrim($b_list, ", ");
                        return $b_list;	
    				})
    				->editColumn('active_from', function($project){                        
                        // dd($project->active_from->toDayDateTimeString());
    					return $project->active_from;
    				})
    				->editColumn('active_till', function($project){
    					return $project->active_till;
    				})	
    				->addColumn('action', function($project){
    					$btns = "<a href='". route('project_edit', $project->id) ."' class='btn btn-xs btn-primary'>Edit</a>";
    					$btns .=  "<a href='". route('project_delete', $project->id) . "' class='btn btn-xs btn-danger'>Delete</a>";
    					return $btns;    					
    				})
    				->make(true);
    }
}
