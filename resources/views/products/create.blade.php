<!doctype html>
<html lang = "en">
<head>
    <meta charset = "UTF-8">
    <title>Add product</title>
    <meta name = "viewport" content = "width=device-width, initial-scale=1">
    <link type = "text/css" rel = "stylesheet"
          href = "//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <link type = "text/css" rel = "stylesheet"
          href = "//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>
<body>
    @include('includes.header_menu')
    <div class = "container">
        <ol class = "breadcrumb">
            <li><a href = "{{url('/')}}">Home</a></li>
            <li><a href = "{{url('products')}}">Products</a></li>
            <li class = "active">Create product</li>
        </ol>
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

        {!! Form::open(['url' => url('/products'), 'method' => 'post', 'class'=>'form-horizontal','role'=>'form']) !!}
        <div class = "form-group">
            {!!Form::label('store_id','Store id:',['class'=>'control-label col-xs-offset-2 col-xs-2'])!!}
            <div class = "col-xs-5">
                {!! Form::text('store_id', null, ['id' => 'store_id','class'=>'form-control']) !!}
            </div>
        </div>
        <div class = "form-group">
            {!!Form::label('id_catalog','ID Catalog:',['class'=>'control-label col-xs-offset-2 col-xs-2'])!!}
            <div class = "col-xs-5">
                {!! Form::text('id_catalog', null, ['id' => 'id_catalog','class'=>'form-control']) !!}
            </div>
        </div>
        <div class = "form-group">
            {!!Form::label('product_name','Product name: ',['class'=>'control-label col-xs-offset-2 col-xs-2'])!!}
            <div class = "col-xs-5">
                {!! Form::text('product_name', null, ['id' => 'product_name','class'=>'form-control']) !!}
            </div>
        </div>
        <div class = "form-group">
            {!!Form::label('product_model','Product model: ',['class'=>'control-label col-xs-offset-2 col-xs-2'])!!}
            <div class = "col-xs-5">
                {!! Form::text('product_model', null, ['id' => 'product_model','class'=>'form-control']) !!}
            </div>
        </div>
        <div class = "form-group">
            {!!Form::label('product_keywords','Product keywords: ',['class'=>'control-label col-xs-offset-2 col-xs-2'])!!}
            <div class = "col-xs-5">
                {!! Form::textarea('product_keywords', null, ['id' => 'product_keywords','class'=>'form-control', 'rows' => 2]) !!}
            </div>
        </div>
        <div class = "form-group">
            {!!Form::label('product_description','Product description: ',['class'=>'control-label col-xs-offset-2 col-xs-2'])!!}
            <div class = "col-xs-5">
                {!! Form::textarea('product_description', null, ['id' => 'product_description','class'=>'form-control', 'rows' => 2]) !!}
            </div>
        </div>
        <div class = "form-group">
            {!!Form::label('product_category','Product category: ',['class'=>'control-label col-xs-offset-2 col-xs-2'])!!}
            <div class = "col-xs-5">
                {!! Form::text('product_category', null, ['id' => 'product_category','class'=>'form-control']) !!}
            </div>
        </div>
        <div class = "form-group">
            {!!Form::label('product_price','Product price: ',['class'=>'control-label col-xs-offset-2 col-xs-2'])!!}
            <div class = "col-xs-5">
                {!! Form::number('product_price', null, ['id' => 'product_price','class'=>'form-control']) !!}
            </div>
        </div>
        <div class = "form-group">
            {!!Form::label('product_url','Product URL: ',['class'=>'control-label col-xs-offset-2 col-xs-2'])!!}
            <div class = "col-xs-5">
                {!! Form::text('product_url', null, ['id' => 'product_url','class'=>'form-control']) !!}
            </div>
        </div>
        <div class = "form-group">
            {!!Form::label('product_thumb','Thumb / Insert image: ',['class'=>'control-label col-xs-offset-2 col-xs-2'])!!}
            <div class = "col-xs-5">
                {!! Form::text('product_thumb', null, ['id' => 'product_thumb','class'=>'form-control']) !!}
            </div>
        </div>
        <div class = "form-group">
            {!!Form::label('is_taxable','Taxable: ',['class'=>'control-label col-xs-offset-2 col-xs-2'])!!}
            <div class = "col-xs-5">
                {!! Form::select('is_taxable', $is_taxable, 1, ['id' => 'is_taxable', 'class'=>'form-control']) !!}
            </div>
        </div>
        <div class = "form-group">
            {!!Form::label('batch_route_id','Batch route: ',['class'=>'control-label col-xs-offset-2 col-xs-2'])!!}
            <div class = "col-xs-5">
                {!! Form::select('batch_route_id', $batch_routes, null, ['id' => 'batch_route_id','class'=>'form-control']) !!}
            </div>
        </div>
        <div class = "form-group">
            <div class = "col-xs-offset-4 col-xs-5">
                {!! Form::submit('Add product',['class'=>'btn btn-primary btn-block']) !!}
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</body>
</html>