@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-primary">

					<div class="panel-heading">
						Edit Project
					</div>	
					<div class="panel-body">
					{!! Form::open(['url' => route('project_update', $project->id)])	!!}
						{{-- {{ Form::token() }}					 --}}			
						{{ Form::bstext('name', $project->name, []) }}
						{{ Form::bsselect('Owner', 'user_id', $users->pluck('name','id'), $project->user_id)  }}				
						{{ Form::submit('Update', ['class' => 'btn btn-primary']) }}
						<a href="/projects" class="btn btn-danger pull-right">Cancel</a>
					{!! Form::close() !!}							

					@if(count($errors)>0)
						<div class="alert alert-danger">
							<ul>
								@foreach($errors->all() as $err)
									<li>{{$err}}</li>
								@endforeach
							</ul>
						</div>
					@endif
					</div>


					
				</div>				
			</div>
		</div>
	</div>
	
@endsection