<!doctype html>
<html lang = "en">
<head>
	<meta charset = "UTF-8">
	<title>Templates</title>
	<meta name = "viewport" content = "width=device-width, initial-scale=1">
	<link type = "text/css" rel = "stylesheet"
	      href = "//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<link type = "text/css" rel = "stylesheet"
	      href = "//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>
<body>
	@include('includes.header_menu')
	<div class = "container">
		<ol class = "breadcrumb">
			<li><a href = "{{url('/')}}">Home</a></li>
			<li class = "active">Templates</li>
		</ol>

		@include('includes.error_div')
		@include('includes.success_div')

		@if(count($templates) > 0)
			<div class = "col-xs-12">
				<table class = "table">
					<tr>
						<th>Action</th>
						<th>#</th>
						<th>Template name</th>
						<th>Status</th>
					</tr>
					@foreach($templates as $template)
						<tr data-id = "{{$template->id}}">
							<td><a href = "{{ url('templates/'.$template->id) }}" class = "update" data-toggle = "tooltip" data-placement = "top"
							       title = "Edit this item"><i class = "fa fa-pencil-square-o text-success"></i> </a>
								| <a href = "#" class = "delete" data-toggle = "tooltip" data-placement = "top"
								     title = "Delete this item"><i class = "fa fa-times text-danger"></i> </a></td>
							<td>{{ $count++ }}</td>
							<td>{{ $template->template_name }}</td>
							<td>{{ $template->is_active ? 'Active' : 'Inactive' }}</td>
						</tr>
					@endforeach
				</table>
			</div>
			<div class = "col-xs-12 text-center">
				{!! $templates->render() !!}
			</div>
			{!! Form::open(['url' => url('/templates/id'), 'method' => 'delete', 'id' => 'delete-template']) !!}
			{!! Form::close() !!}
		@else
			<div class = "col-xs-12">
				<div class = "alert alert-warning text-center">
					<h3>No template found.</h3>
				</div>
			</div>
		@endif
		<div class = "col-xs-12">
			<h3 class = "page-header">Create new template</h3>
			{!! Form::open(['url' => url('templates'), 'method' => 'post', 'class' => 'form-horizontal']) !!}
			<div class = "form-group">
				{!! Form::label('template_name', 'Template name: ', ['class' => 'control-label col-xs-2']) !!}
				<div class = "col-xs-6">
					{!! Form::text('template_name', null, ['id' => 'template_name', 'class' => "form-control", 'placeholder' => "Enter template name"]) !!}
				</div>
				{!! Form::submit('Add template', ['class' => 'btn btn-success']) !!}
			</div>
			{!! Form::close() !!}
		</div>
	</div>
	<script type = "text/javascript" src = "//code.jquery.com/jquery-1.11.3.min.js"></script>
	<script type = "text/javascript" src = "//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<script type = "text/javascript">
		$(function ()
		{
			$('[data-toggle="tooltip"]').tooltip();
		});
		var message = {
			delete: 'Are you sure you want to delete?',
		};
		$("a.delete").on('click', function (event)
		{
			event.preventDefault();
			var id = $(this).closest('tr').attr('data-id');
			var action = confirm(message.delete);
			if ( action ) {
				var form = $("form#delete-template");
				var url = form.attr('action');
				form.attr('action', url.replace('id', id));
				form.submit();
			}
		});
	</script>
</body>
</html>