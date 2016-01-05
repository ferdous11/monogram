<!doctype html>
<html lang = "en">
<head>
    <meta charset = "UTF-8">
    <title>Create station</title>
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

        {!! Form::open(['url' => url('/stations'), 'method' => 'post']) !!}
        <div class = "col-xs-12 apply-margin-top-bottom">
            <div class = "col-xs-3">station_name</div>
            <div class = "col-xs-6">
                {!! Form::text('station_name', null, ['id' => 'station_name']) !!}
            </div>
        </div>
        <div class = "col-xs-12 apply-margin-top-bottom">
            <div class = "col-xs-3">station_description</div>
            <div class = "col-xs-6">
                {!! Form::text('station_description', null, ['id' => 'station_description']) !!}
            </div>
        </div>
        <div class = "col-xs-12 apply-margin-top-bottom">
            <div class = "col-xs-6">
                {!! Form::submit('Create station') !!}
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</body>
</html>