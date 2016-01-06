<!doctype html>
<html lang = "en">
<head>
    <meta charset = "UTF-8">
    <title>Create category</title>
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

        {!! Form::open(['url' => url('/categories'), 'method' => 'post']) !!}
        <div class = "col-xs-12 apply-margin-top-bottom">
            <div class = "col-xs-3">category_code</div>
            <div class = "col-xs-6">
                {!! Form::text('category_code', null, ['id' => 'category_code']) !!}
            </div>
        </div>
        <div class = "col-xs-12 apply-margin-top-bottom">
            <div class = "col-xs-3">category_description</div>
            <div class = "col-xs-6">
                {!! Form::text('category_description', null, ['id' => 'category_description']) !!}
            </div>
        </div>
        <div class = "col-xs-12 apply-margin-top-bottom">
            <div class = "col-xs-3">category_display_order</div>
            <div class = "col-xs-6">
                {!! Form::text('category_display_order', null, ['id' => 'category_display_order']) !!}
            </div>
        </div>
        <div class = "col-xs-12 apply-margin-top-bottom">
            <div class = "col-xs-6">
                {!! Form::submit('Create category') !!}
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</body>
</html>