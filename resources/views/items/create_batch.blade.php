<!doctype html>
<html lang = "en">
<head>
	<meta charset = "UTF-8">
	<title>Batch routes</title>
	<meta name = "viewport" content = "width=device-width, initial-scale=1">
	<link type = "text/css" rel = "stylesheet"
	      href = "//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<link type = "text/css" rel = "stylesheet"
	      href = "//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.9.3/css/bootstrap-select.min.css">
	<link type = "text/css" rel = "stylesheet"
	      href = "//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<style>
		table {
			table-layout: fixed;
		}
	</style>
</head>
<body>
	@include('includes.header_menu')
	<div class = "container">
		<ol class = "breadcrumb">
			<li><a href = "{{url('/')}}">Home</a></li>
			<li class = "active">Batch rotes</li>
		</ol>
		@if($errors->any())
			<div class = "col-xs-12">
				<div class = "alert alert-danger">
					<ul>
						@foreach($errors->all() as $error)
							<li>{{$error}}</li>
						@endforeach
					</ul>
				</div>
			</div>
		@endif

		@if(count($batch_routes) > 0)
			{!! Form::open(['url' => url('items/batch'), 'method' => 'post']) !!}
			<div class = "row">
				<div class = "col-xs-12">
					<table class = "table">
						<tr>
							<th>Batch#</th>
							<th>Route</th>
							<th>ID</th>
							<th>Order date</th>
							<th>SKU</th>
							<th>Quantity</th>
						</tr>
					</table>
				</div>
				@foreach($batch_routes as $batch_route)
					@if($batch_route->itemGroups)
						@foreach($batch_route->itemGroups->chunk($batch_route->batch_max_units) as $croppedRows)
							<div class = "col-xs-12">
								<table class = "table">
									<tr data-id = "{{$batch_route->id}}">
										<td>{{ $count++ }}</td>
										<td>
											<div class = "checkbox">
												<label>
													{!! Form::checkbox('select-deselect', 1, false, ['class' => 'group-select']) !!} {{$batch_route->batch_code}}
												</label>
											</div>
										</td>
										<td>Next station >>> {{$batch_route->stations_list[0]->station_name}}</td>
										<td></td>
										<td></td>
										<td></td>
									</tr>
									@foreach($croppedRows as $item)
										<tr>
											<td></td>
											<td>{!! Form::checkbox('product[]', sprintf("%s|%s|%s", $batch_route->id, $item->product_table_id, $item->item_table_id) ,false) !!}</td>
											<td>{{$item->order_id}}</td>
											<td>{{$item->order_date}}</td>
											<td>{{$item->item_id}}</td>
											<td>{{$item->item_quantity}}</td>
										</tr>
									@endforeach
									<tr>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td><span class = "selected">0</span> of {{$batch_route->batch_max_units}}</td>
									</tr>
								</table>
							</div>
						@endforeach
					@endif
				@endforeach
			</div>
			<div class = "col-xs-12 text-center">
				<div class = "checkbox">
					<label>
						{!! Form::checkbox('select-deselect', 1, false, ['id' => 'select-deselect']) !!} Select add /
						                                                                                 Deselect all
					</label>
				</div>
			</div>
			{!! Form::close() !!}
		@else
			<div class = "col-xs-12">
				<div class = "alert alert-warning text-center">
					<h3>No batch to create.</h3>
				</div>
			</div>
		@endif
	</div>
	<script type = "text/javascript" src = "//code.jquery.com/jquery-1.11.3.min.js"></script>
	<script type = "text/javascript" src = "//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<script type = "text/javascript">
		var state = false;
		$("input#select-deselect").click(function (event)
		{
			state = !state;
			$("input[type='checkbox']").not($(this)).prop('checked', state);
		});
		$("input.group-select").on("click", function (event){
			var tr = $(this).closest('tr');
			var state = $(this).prop('checked');
			tr.nextAll('tr').each(function(){
				$(this).find(':checkbox').prop('checked', state);
			});
		});
	</script>
</body>
</html>