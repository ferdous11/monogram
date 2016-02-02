<!DOCTYPE html>
<html>
<head>
	<title>{{env('APPLICATION_NAME')}} - Home</title>
	<meta name = "viewport" content = "width=device-width, initial-scale=1">
	<link type = "text/css" rel = "stylesheet"
	      href = "//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<link type = "text/css" rel = "stylesheet"
	      href = "//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>
<body>
	@include('includes.header_menu')
	<div class = "container">
		<div class = "col-xs-6">
			<div class = "col-xs-12">
				<h5 class = "page-header">Users Management</h5>
				<ul>
					<li><a href = "/users">Users</a></li>
					<li><a href = "/users/create">Create user</a></li>
					<li><a href = "/customers">Customers</a></li>
					<li><a href = "/customers/create">Create Customer</a></li>
				</ul>
			</div>
			<div class = "col-xs-12">
				<h5 class = "page-header">Logistics</h5>
				<ul>
					<li><a href = "/logistics/sku_converter">Set store options to SKU conversion parameters</a></li>
					<li><a href = "/logistics/sku_import">Export/Import options coded SKUs CSV file</a></li>
				</ul>
			</div>
		</div>
		<div class = "col-xs-6">
			<div class = "col-xs-12">
				<h5 class = "page-header">Workflow Management</h5>
				<ul>
					<li><a href = "/categories">Categories</a></li>
					<li><a href = "/sub_categories">Sub categories</a></li>
					<li><a href = "/products">Products ( SKUs ) </a></li>
					{{--<li><a href = "/orders">Orders</a></li>--}}
					<li><a href = "/orders/list">Orders</a></li>
					<li><a href = "/stations">Stations</a></li>
					<li><a href = "/batch_routes">Routes</a></li>
					<li><a href = "/items">Order items list status</a></li>
					<li><a href = "/items/batch">Preview batch</a></li>
					<li><a href = "/items/grouped">Batch list</a></li>
					<li><a href = "/stations/supervisor">Supervisor</a></li>
				</ul>
				<hr />
				<ul>
					{{--<li><a href = "/orders/create">Create Order</a></li>--}}
					<li><a href = "/products/create">Create Product</a></li>
					<li><a href = "/orders/add">Add new order</a></li>
					{{--<li><a href = "/stations/create">Create Station</a></li>--}}
					{{--<li><a href = "/categories/create">Create Category</a></li>--}}
					{{--<li><a href = "/batch_routes/create">Create batch routes</a></li>--}}
					<li><a href = "/stations/status">Station status</a></li>
					<li><a href = "/stations/my_station">My station</a></li>
				</ul>
			</div>
			{{--<div class = "col-xs-3">
				<h5 class = "page-header">Users</h5>
				<ul>
					<li><a href = "/users">Users</a></li>
					<li><a href = "/users/create">Create user</a></li>
				</ul>
			</div>
			<div class = "col-xs-3">
				<h5 class = "page-header">Customer</h5>
				<ul>
					<li><a href = "/customers">Customers</a></li>
					<li><a href = "/customers/create">Create Customer</a></li>
				</ul>
			</div>
			<div class = "col-xs-3">
				<h5 class = "page-header">Products</h5>
				<ul>
					<li><a href = "/products">Products</a></li>
					<li><a href = "/products/create">Create Product</a></li>
				</ul>
			</div>
			<div class = "col-xs-3">
				<h5 class = "page-header">Orders</h5>
				<ul>
					<li><a href = "/orders">Orders</a></li>
					<li><a href = "/orders/create">Create Order</a></li>
					<li><a href = "/orders/list">Orders list</a></li>
					<li><a href = "/orders/add">Add new order</a></li>
				</ul>
			</div>
			<div class = "col-xs-3">
				<h5 class = "page-header">Stations</h5>
				<ul>
					<li><a href = "/stations">Stations</a></li>
					<li><a href = "/stations/create">Create Station</a></li>
				</ul>
			</div>
			<div class = "col-xs-3">
				<h5 class = "page-header">Category</h5>
				<ul>
					<li><a href = "/categories">Category</a></li>
					<li><a href = "/categories/create">Create Category</a></li>
				</ul>
			</div>
			<div class = "col-xs-3">
				<h5 class = "page-header">Batch routes</h5>
				<ul>
					<li><a href = "/batch_routes">Batch routes</a></li>
					<li><a href = "/batch_routes/create">Create batch routes</a></li>
				</ul>
			</div>
			<div class = "col-xs-3">
				<h5 class = "page-header">Production Automation</h5>
				<ul>
					<li><a href = "/items">Order items list status</a></li>
					<li><a href = "/items/grouped">Created Batches</a></li>
					<li><a href = "/stations/status">Station status</a></li>
					<li><a href = "/stations/my_station">My station</a></li>
					<li><a href = "/stations/supervisor">Supervisor</a></li>
				</ul>
			</div>
			<div class = "col-xs-12">
				<ul>
				@foreach($stations as $station)
					<li><a href="{{url('set/'.$station->id)}}">{{$station->station_description}}</a></li>
				@endforeach
				</ul>
			</div>--}}
		</div>
</body>
</html>
