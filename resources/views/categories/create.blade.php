<!doctype html>
<html lang = "en">
<head>
    <meta charset = "UTF-8">
    <title>Create category</title>
    <link type = "text/css" rel = "stylesheet"
          href = "//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <style>
        div.apply-margin-top-bottom {
            margin: 5px;
        }
    </style>
</head>
<body>
    @include('includes.header_menu')
    <div class = "container">
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

        <fieldset>
            <legend>Create new category</legend>
            <div class = "form-group col-xs-12">
                {!! Form::label('category_code', 'Category code', ['class' => 'col-xs-2 control-label']) !!}
                <div class = "col-sm-4">
                    {!! Form::text('category_code', null, ['id' => 'category_code', 'class' => "form-control", 'placeholder' => "Enter category code"]) !!}
                </div>
            </div>
            <div class = "form-group col-xs-12">
                {!! Form::label('category_description', 'Description', ['class' => 'col-xs-2 control-label']) !!}
                <div class = "col-sm-4">
                    {!! Form::text('category_description', null, ['id' => 'category_description', 'class' => "form-control", 'placeholder' => "Enter category description"]) !!}
                </div>
            </div>
            <div class = "form-group col-xs-12">
                {!! Form::label('category_display_order', 'Display order', ['class' => 'col-xs-2 control-label']) !!}
                <div class = "col-sm-4">
                    {!! Form::text('category_display_order', null, ['id' => 'category_display_order', 'class' => "form-control", 'placeholder' => "Enter category display order"]) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-offset-2 col-xs-6">
                    {!! Form::submit('Create category', ['class' => 'btn btn-primary']) !!}
                </div>
            </div>
        </fieldset>
        {!! Form::close() !!}
    </div>
</body>
</html>