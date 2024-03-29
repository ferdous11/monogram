<!doctype html>
<html lang = "en">
<head>
	<meta charset = "UTF-8">
	<title>Batch preview</title>
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
			font-size: 11px;
		}

		td {
			width: auto;
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
			<div class = "col-xs-12">
				<div class = "checkbox pull-left">
					<label>
						{!! Form::checkbox('select-deselect', 1, false, ['id' => 'select-deselect']) !!} Select add /
						                                                                                 Deselect all
					</label>
				</div>
				<div class="form-group pull-right">
					{!! Form::submit('Create batch', ['class' => 'btn btn-success']) !!}
				</div>
			</div>
			<div class = "row">
				<div class = "col-xs-12">
					<table class = "table">
						<tr>
							<th>Batch#</th>
							<th>S.L#</th>
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
						@foreach($batch_route->itemGroups->chunk($batch_route->batch_max_units) as $chunkedRows)
							<div class = "col-xs-12">
								<table class = "table" style = "margin-top: 5px;">
									<tr data-id = "{{$batch_route->id}}">
										<td>{{ $count }}</td>
										<td></td>
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
									@foreach($chunkedRows as $item)
										<tr>
											<td></td>
											<td>{{$serial++}}</td>
											<td>{!! Form::checkbox('batches[]', sprintf("%s|%s|%s", $count, $batch_route->id, /*$item->product_table_id, */$item->item_table_id) ,false, ['class' => 'checkable']) !!}</td>
											<td>{{$item->order_id}}</td>
											<td>{{substr($item->order_date, 0, 10)}}</td>
											<td>{{$item->item_code}}</td>
											<td>{{$item->item_quantity}}</td>
										</tr>
									@endforeach
									<tr>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td><span class = "item_selected">0</span> of <span
													class = "item_total">{{$batch_route->batch_max_units}}</span>
										</td>
									</tr>
									@setvar(++$count)
								</table>
							</div>
						@endforeach
					@endif
				@endforeach
			</div>
			<div class = "col-xs-12">
				<div class = "checkbox pull-left">
					<label>
						{!! Form::checkbox('select-deselect', 1, false, ['id' => 'select-deselect']) !!} Select add /
						                                                                                 Deselect all
					</label>
				</div>
				<div class="form-group pull-right">
					{!! Form::submit('Create batch', ['class' => 'btn btn-success']) !!}
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
			$("table").each(function ()
			{
				updateTableInfo($(this));
			});
		});
		$("input.group-select").on("click", function (event)
		{
			var table = $(this).closest('table');
			var state = $(this).prop('checked');
			table.find('tr').not(':first').not(':last').each(function ()
			{
				$(this).find('input:checkbox').prop('checked', state);
			});

			updateTableInfo(table);
		});
		$("input.checkable").not('input#select-deselect, input.group-select').on('click', function (event)
		{
			var table = $(this).closest('table');
			var item_selected = getSelectedItemCount(table);
			var item_total = table.find('tr').not(':first').not(':last').length;
			//$(table).find('span.item_selected').text(item_selected);
			updateTableInfo(table);
			$(table).find('tr').eq(0).find('input:checkbox').prop('checked', item_selected == item_total);
		});

		function updateTableInfo (table)
		{
			$(table).find('span.item_selected').text(getSelectedItemCount(table));
		}

		function getSelectedItemCount (table)
		{
			var total_selected = 0;
			table.find('tr').not(':first').not(':last').each(function ()
			{
				if ( $(this).find('input:checkbox').prop('checked') == true ) {
					++total_selected;
				}
			});
			return total_selected;
		}
	</script>
</body>
</html>