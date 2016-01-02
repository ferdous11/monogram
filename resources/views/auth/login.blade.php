<!doctype html>
<html lang = "en">
<head>
    <meta charset = "UTF-8">
    <title>Login</title>
    <link type="text/css" rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
</head>
<body>
    <div class = "container" style="margin-top: 30px;">
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
        {!! Form::open(['url' => url('/login'), 'method' => 'post']) !!}
        <div class = "col-xs-12">
            <div class = "col-xs-3">Email:</div>
            <div class = "col-xs-6">
                {!! Form::email('email', null, ['id' => 'email']) !!}
            </div>
        </div>
        <div class = "col-xs-12">
            <div class = "col-xs-3">Password:</div>
            <div class = "col-xs-6">
                {!! Form::password('password', ['id' => 'password']) !!}
            </div>
        </div>
        <div class = "col-xs-12">
            <div class = "col-xs-6">
                {!! Form::submit('Login') !!}
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</body>
</html>