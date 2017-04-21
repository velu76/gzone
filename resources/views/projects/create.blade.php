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
					{{Form::close()}}		

					<div class="input-append date form_datetime">
					    <input size="56" type="text" value="" readonly>
					    <span class="add-on"><i class="icon-th"></i></span>
					</div>
				</div>
			</div>
		</div>
	</div>

	@push('scripts')
		 <script type="text/javascript">
			$(".form_datetime").datetimepicker({
        format: "dd MM yyyy - hh:ii",
        autoclose: true,
        todayBtn: true,
        pickerPosition: "bottom-left"
    });       
        </script>
	@endpush
@endsection