@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
			
			<div class="panel panel-info">
				<div class="panel-heading">
					<h4>Projects</h4>							
						<a href="{{route('project_create')}}" class="btn btn-xs btn-success pull-right">Create New Project</a>
				</div>

				<div class="panel-body">
					<table class="table table-bordered" id="projects-table">
						<thead>
							<tr>
								<th>Name</th>
								<th>Owner</th>
								<th>Active From</th>
								<th>Active Till</th>
								<th>Action</th>
							</tr>
						</thead>						
					</table>
				</div>
			</div>
			
			</div>		
		</div>
	</div>
	@push('scripts')
	<script>
	$(function() {
		$('#projects-table').DataTable({
			processing: true,
			serverSide: true,
			ajax: "{!! url('datatables') !!}",
			columns: 
			[
				{data:'name', name: 'name'},
				{data:'user_id', name: 'user_id'},
				{data:'active_from', name: 'active_from'},
				{data:'active_till', name: 'active_till'},
				{data:'action', name: 'action', orderable: false, searchable: false},								
			]
		});
	});		
	</script>	
	@endpush
@endsection
