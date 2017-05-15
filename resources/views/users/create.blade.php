@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-primary">
				<div class="panel-heading">
					Create a new user
				</div>

				<div class="panel-body">
					{{ Form::open(['url' => route('user_store')]) }}
					
					{{ Form::bstext('name') }}
										
					{!! Form::label('Role(s)') !!}										
				 	{!! Form::select('role_id[]',  $roles,  null, ['class' => 'form-control', 'multiple' => 'multiple']) !!}

					{{ Form::bstext('email') }}

					{{ Form::bstext('email_confirmation') }}
					
					<hr>	
					
            		{{ Form::submit('Create', ['class' => 'btn btn-primary']) }}
					<a href="/users" class="btn btn-danger pull-right">Cancel</a>
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