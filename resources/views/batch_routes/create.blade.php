<!doctype html>
<html lang = "en">
<head>
    <meta charset = "UTF-8">
    <title>Create Batch</title>
    <link type = "text/css" rel = "stylesheet"
          href = "//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <link type = "text/css" rel = "stylesheet"
          href = "//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.9.3/css/bootstrap-select.min.css">
    <style>
        div.apply-margin-top-bottom {
            margin: 5px;
        }
    </style>
</head>
<body>
    <div class = "container apply-margin-top-bottom">
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

        {!! Form::open(['url' => url('/batch_routes'), 'method' => 'post']) !!}
        <div class = "col-xs-12 apply-margin-top-bottom">
            <div class = "col-xs-3">batch_code</div>
            <div class = "col-xs-6">
                {!! Form::text('batch_code', null, ['id' => 'batch_code']) !!}
            </div>
        </div>
        <div class = "col-xs-12 apply-margin-top-bottom">
            <div class = "col-xs-3">batch_route_name</div>
            <div class = "col-xs-6">
                {!! Form::text('batch_route_name', null, ['id' => 'batch_route_name']) !!}
            </div>
        </div>
        <div class = "col-xs-12 apply-margin-top-bottom">
            <div class = "col-xs-3">batch_max_units</div>
            <div class = "col-xs-6">
                {!! Form::text('batch_max_units', null, ['id' => 'batch_max_units']) !!}
            </div>
        </div>
        <div class = "col-xs-12 apply-margin-top-bottom">
            <div class = "col-xs-3">batch_stations</div>
            <div class = "col-xs-6">
                {!! Form::select('batch_stations', $stations, null, ['id' => 'batch_stations', 'multiple' => true, 'class' => 'selectpicker', "data-live-search" => "true"]) !!}
            </div>
        </div>
        <div class = "col-xs-12 apply-margin-top-bottom">
            <div class = "col-xs-3">batch_options</div>
            <div class = "col-xs-6">
                {!! Form::text('batch_options', null, ['id' => 'batch_options']) !!}
            </div>
        </div>
        <div class = "col-xs-12 apply-margin-top-bottom">
            <div class = "col-xs-6">
                {!! Form::submit('Create batch route') !!}
            </div>
        </div>
        {!! Form::close() !!}
    </div>
    <script type = "text/javascript" src = "//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script type = "text/javascript"
            src = "//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.9.3/js/bootstrap-select.min.js"></script>
    <script type = "text/javascript">
        $('.selectpicker').selectpicker();
    </script>
</body>
</html>