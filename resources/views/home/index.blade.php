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
        <div class = "col-xs-3">
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
            </ul>
        </div>
    </div>
</body>
</html>
