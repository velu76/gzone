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
					<hr>	
					<div class='input-group date'>
						<label for="active_from">Active From</label>
					</div>

					<div class='input-group date'  id='active_from'>						
	                    <input type='text' class="form-control" name="active_from" />
	                    <span class="input-group-addon">
	                        <span class="glyphicon glyphicon-calendar"></span>
	                    </span>
                	</div>
					<hr>					
					<div class='input-group date'>
                		<label for="active_till">Active Till</label>
	                </div>
                	<div class='input-group date' id='active_till'>                		
	                    <input type='text' class="form-control" name="active_till" />
	                    <span class="input-group-addon">
	                        <span class="glyphicon glyphicon-calendar"></span>
	                    </span>
                	</div>
					<hr>
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
					{{Form::close()}}		

					
				</div>
			</div>
		</div>
	</div>

	@push('scripts')
		 <script type="text/javascript">
			 $(function () {
                $('#active_from').datetimepicker();
                $('#active_till').datetimepicker();
            });       
        </script>
	@endpush
@endsection