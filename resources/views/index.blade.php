<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>
        <link type="text/css" rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <style>
            .border{
                border: 1px solid #245269;
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
        </div>
    </body>
</html>
