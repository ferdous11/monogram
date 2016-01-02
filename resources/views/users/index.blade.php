<!doctype html>
<html lang = "en">
<head>
	<meta charset = "UTF-8">
	<title>Users</title>
	<link type = "text/css" rel = "stylesheet"
	      href = "//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
</head>
<body>
	<div class = "container" style = "margin-top: 50px;">
		@if(count($users) > 0)
			<table class = "table table-bordered">
				<tr>
					<th>#</th>
					<th>Name</th>
					<th>Email</th>
					<th>Location</th>
					<th>Action</th>
				</tr>
				@foreach($users as $user)
					<tr>
						<td>{{ $count++ }}</td>
						<td>{{ substr($user->username, 0, 30) }}</td>
						<td>{{ $user->email }}</td>
						<td>{{ $user->state }} ( Foreign key for Location )</td>
						<td>
							<a href = "{{ url(sprintf("/users/%d", $user->id)) }}">View</a> /
							<a href = "{{ url(sprintf("/users/%d/edit", $user->id)) }}">Edit</a>
						</td>
					</tr>
				@endforeach
			</table>
			<div class = "col-xs-12 text-center">
				{!! $users->render() !!}
			</div>
		@else
			<div class = "alert alert-warning">No customer is registered</div>
		@endif
	</div>
</body>
</html>