<!doctype html>
<html lang = "en">
<head>
	<meta charset = "UTF-8">
	<title>Supervisor</title>
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
			<li>Supervisor</li>
		</ol>
		@if(count($items) > 0)
			<h3 class = "page-header">
				Items for supervision
			</h3>
			<table class = "table table-bordered">
				<tr>
					<th>Order#</th>
					<th>Order date</th>
					<th>Store id</th>
					{{--<th>Customer</th>
					<th>State</th>
					<th>Description</th>--}}
					<th>ID</th>
					{{--<th>Option</th>--}}
					<th>Qty.</th>
					<th>Batch</th>
					<th>Batch creation date</th>
					<th>Station</th>
				</tr>
				@foreach($items as $item)
					<tr data-id = "{{$item->id}}">
						<td><a href = "{{ url("orders/details/".$item->order_id) }}"
						       class = "btn btn-link">{{$item->order->short_order}}</a></td>
						<td>{{$item->order->order_date}}</td>
						<td>{{$item->store->store_name}}</td>
						{{--<td><a href = "{{ url("customers/".$item->order->customer->id) }}" title = "This is customer id"
						       class = "btn btn-link">{{ !empty($item->order->customer->ship_full_name) ? $item->order->customer->ship_full_name : $item->order->customer->bill_full_name }}</a>
						</td>
						<td>{{$item->order->customer->ship_state}}</td>
						<td>{{$item->item_description}}</td>--}}
						<td>{{$item->item_id}}</td>
						{{--<td>{{\Monogram\Helper::jsonTransformer($item->item_option)}}</td>--}}
						<td>{{$item->item_quantity}}</td>
						<td>{{$item->batch_number }}</td>
						<td>{{$item->batch_creation_date}}</td>
						<td>
							{!! Form::select('next_station', $item->route->stations_list->lists('station_description', 'station_name')->prepend('Select a next station', ''), null, ['class' => 'form-control next_station']) !!}
						</td>
					</tr>
				@endforeach
				{!! Form::open(['url' => url('stations/assign_to_station'), 'method' => 'post', 'id' => 'assign-to-station']) !!}
				{!! Form::close() !!}
			</table>
			<div class = "col-xs-12 text-center">
				{!! $items->render() !!}
			</div>
		@else
			<div class = "col-xs-12">
				<div class = "alert alert-warning text-center">
					<h3>No item found to supervise.</h3>
				</div>
			</div>
		@endif
	</div>
	<script type = "text/javascript" src = "//code.jquery.com/jquery-1.11.3.min.js"></script>
	<script type = "text/javascript" src = "//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<script type = "text/javascript">
		$("select.next_station").on('change', function ()
		{
			$(this).prop('disabled', 'disabled');
			var station_name = $(this).val();
			var item_id = $(this).closest('tr').attr('data-id');

			$("<input type='hidden' value='' />")
					.attr("name", "item_id")
					.attr("value", item_id)
					.appendTo($("form#assign-to-station"));
			$("<input type='hidden' value='' />")
					.attr("name", "station_name")
					.attr("value", station_name)
					.appendTo($("form#assign-to-station"));

			$("form#assign-to-station").submit();
		});
	</script>
</body>
</html>