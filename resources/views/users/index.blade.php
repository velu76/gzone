@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-info">
					<div class="panel-heading">
						<h4>Users and Permissions</h4>
						<a href="{{route('user_create')}}" class="btn btn-xs btn-success pull-right">Create New User</a>
					</div>

					<div class="panel-body">
						<table class="table table-bordered" id="users-table">
							<thead>
								<tr>
									<th>Action</th>							
									<th>User Name</th>
									<th>Email</th>
									<th>Permissions</th>										
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
			$(function(){
				$('#users-table').DataTable({
					processing: true,
					serverSide: true,
					ajax: "{!! url('udata') !!}",
					columns: 
					[
						{data:'action', name:'action', orderable: false, searchable: false},
						{data:'name', name:'name'},
						{data:'email', name:'email'},
						{data:'permission', name:'permission'},						
					]
				});
			});
		</script>
	@endpush
@endsection