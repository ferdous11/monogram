<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>
        <link type="text/css" rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <style>
            .border{
                border: 1px solid #245269;
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <div class = "container" style="margin-top: 30px;">
            <div class="col-xs-12 text-center">
                User is: @if(Auth::check()) Logged In @else Not Logged In @endif
            </div>
            <div class="col-xs-12 border">
                <a href="/login" >Login</a>
            </div>
            <div class="col-xs-12 border">
                <a href="/logout" >Logout</a>
            </div>
            <div class="col-xs-12 border">
                <a href="/users" >Users</a>
            </div>
            <div class="col-xs-12 border">
                <a href="/users/create" >Create user</a>
            </div>
            <div class="col-xs-12 border">
                <a href="/customers" >Customers</a>
            </div>
            <div class="col-xs-12 border">
                <a href="/customers/create" >Create Customer</a>
            </div>
            <div class="col-xs-12 border">
                <a href="/products" >Products</a>
            </div>
            <div class="col-xs-12 border">
                <a href="/products/create" >Create Product</a>
            </div>
            <div class="col-xs-12 border">
                <a href="/orders" >Orders</a>
            </div>
            <div class="col-xs-12 border">
                <a href="/orders/create" >Create Order</a>
            </div>
            <div class="col-xs-12 border">
                <a href="/stations" >Stations</a>
            </div>
            <div class="col-xs-12 border">
                <a href="/stations/create" >Create Station</a>
            </div>
            <div class="col-xs-12 border">
                <a href="/categories" >Category</a>
            </div>
            <div class="col-xs-12 border">
                <a href="/categories/create" >Create Category</a>
            </div>
        </div>
    </body>
</html>
