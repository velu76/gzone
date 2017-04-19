@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
			
			<div class="panel panel-info">
				<div class="panel-heading">
					<h4>Projects</h4>							
						<a href="#" class="btn btn-xs btn-success pull-right">Create New Project</a>
				</div>

				<div class="panel-body">
					<table class="table table-bordered" id="projects-table">
						<thead>
							<tr>
								<th>Name</th>
								<th>Owner</th>
								<th>Created On</th>
								<th>Updated On</th>
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
				{data:'created_at', name: 'created_at'},
				{data:'updated_at', name: 'updated_at'},
				{data:'action', name: 'action', orderable: false, searchable: false},								
			]
		});
	});		
	</script>	
	@endpush
@endsection
