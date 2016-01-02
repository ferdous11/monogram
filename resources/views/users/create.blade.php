<!doctype html>
<html lang = "en">
<head>
    <meta charset = "UTF-8">
    <title>Create User</title>
    <link type="text/css" rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <style>
        div.apply-margin-top-bottom {
            margin: 5px;
        }
    </style>
</head>
<body>
    <div class="container apply-margin-top-bottom" >
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

        {!! Form::open(['url' => url('/users'), 'method' => 'post']) !!}
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">username</div>
                <div class = "col-xs-6">
                    {!! Form::text('username', null, ['id' => 'username']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">email</div>
                <div class = "col-xs-6">
                    {!! Form::email('email', null, ['id' => 'email']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">password</div>
                <div class = "col-xs-6">
                    {!! Form::password('password', ['id' => 'password']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">role</div>
                <div class = "col-xs-6">
                    {!! Form::select('role', $roles, null, ['id' => 'vendor_id']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">vendor_id(TODO: SELECT TYPE)</div>
                <div class = "col-xs-6">
                    {!! Form::text('vendor_id', null, ['id' => 'vendor_id']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">zip_code</div>
                <div class = "col-xs-6">
                    {!! Form::text('zip_code', null, ['id' => 'zip_code']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">state(TODO: SELECT TYPE)</div>
                <div class = "col-xs-6">
                    {!! Form::text('state', null, ['id' => 'state']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-6">
                    {!! Form::submit('Create User') !!}
                </div>
            </div>

        {!! Form::close() !!}
    </div>
</body>
</html>