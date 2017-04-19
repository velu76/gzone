@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-primary">
				<div class="panel-heading">
					Create a new project
				</div>

				<div class="panel-body">
					{{Form::open(['url' => route('project_store')])}}
					{{Form::bstext('name')}}
					{{Form::bsselect('Owner', 'user_id', $users->pluck('name','id'),'')}}
					{{ Form::submit('Create', ['class' => 'btn btn-primary']) }}
					<a href="/projects" class="btn btn-danger pull-right">Cancel</a>
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
@endsection