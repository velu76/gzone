@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-info">
					<div class="panel-heading">
						<h4>Users and Permissions</h4>
					</div>

					<div class="panel-body">
						<table class="table table-bordered" id="users-table">
							<thead>
								<tr>
									<th>User Name</th>
									<th>Email</th>
									<th>Permissions</th>
									<th>Account Valid Till</th>
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
						{data:'name', name:'name'},
						{data:'email', name:'email'},
						{data:'permission', name:'permission'},
						{data:'valid', name:'valid'},
					]
				});
			});
		</script>
	@endpush
@endsection