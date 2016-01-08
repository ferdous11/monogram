<!doctype html>
<html lang = "en">
<head>
    <meta charset = "UTF-8">
    <title>Edit Product - {{ $product->product_name}}</title>
    <link type = "text/css" rel = "stylesheet"
          href = "//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <link type = "text/css" rel = "stylesheet"
          href = "//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
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

        {!! Form::open(['url' => url(sprintf("/products/%d", $product->id)), 'method' => 'put', 'class'=>'form-horizontal','role'=>'form']) !!}
        <div class = "form-group">
            {!!Form::label('storeId','Store id:',['class'=>'control-label col-xs-offset-2 col-xs-2'])!!}
            <div class = "col-xs-5">
                {!! Form::text('storeId', $product->storeId, ['id' => 'storeId','class'=>'form-control']) !!}
            </div>
        </div>
        <div class = "form-group">
            {!!Form::label('idCatalog','ID Catalog:',['class'=>'control-label col-xs-offset-2 col-xs-2'])!!}
            <div class = "col-xs-5">
                {!! Form::text('idCatalog', $product->idCatalog, ['id' => 'idCatalog','class'=>'form-control']) !!}
            </div>
        </div>
        <div class = "form-group">
            {!!Form::label('vendorId','Vendor id: ',['class'=>'control-label col-xs-offset-2 col-xs-2'])!!}
            <div class = "col-xs-5">
                {!! Form::text('vendorId', $product->vendorId, ['id' => 'vendorId','class'=>'form-control']) !!}
            </div>
        </div>
        <div class = "form-group">
            {!!Form::label('model','Model: ',['class'=>'control-label col-xs-offset-2 col-xs-2'])!!}
            <div class = "col-xs-5">
                {!! Form::text('model', $product->model, ['id' => 'model','class'=>'form-control']) !!}
            </div>
        </div>
        <div class = "form-group">
            {!!Form::label('product_url','Product url: ',['class'=>'control-label col-xs-offset-2 col-xs-2'])!!}
            <div class = "col-xs-5">
                {!! Form::text('product_url', $product->product_url, ['id' => 'product_url','class'=>'form-control']) !!}
            </div>
        </div>
        <div class = "form-group">
            {!!Form::label('product_name','Product name: ',['class'=>'control-label col-xs-offset-2 col-xs-2'])!!}
            <div class = "col-xs-5">
                {!! Form::text('product_name', $product->product_name, ['id' => 'product_name','class'=>'form-control']) !!}
            </div>
        </div>
        <div class = "form-group">
            {!!Form::label('ship_weight','Ship weight: ',['class'=>'control-label col-xs-offset-2 col-xs-2'])!!}
            <div class = "col-xs-5">
                {!! Form::text('ship_weight', $product->ship_weight, ['id' => 'ship_weight','class'=>'form-control']) !!}
            </div>
        </div>
        <div class = "form-group">
            {!!Form::label('productCost','Product cost: ',['class'=>'control-label col-xs-offset-2 col-xs-2'])!!}
            <div class = "col-xs-5">
                {!! Form::text('productCost', $product->productCost, ['id' => 'productCost','class'=>'form-control']) !!}
            </div>
        </div>
        <div class = "form-group">
            {!!Form::label('mcategory','M Category: ',['class'=>'control-label col-xs-offset-2 col-xs-2'])!!}
            <div class = "col-xs-5">
                {!! Form::text('mcategory', $product->mcategory, ['id' => 'mcategory','class'=>'form-control']) !!}
            </div>
        </div>
        <div class = "form-group">
            {!!Form::label('cat','Cat: ',['class'=>'control-label col-xs-offset-2 col-xs-2'])!!}
            <div class = "col-xs-5">
                {!! Form::text('cat', $product->cat, ['id' => 'cat','class'=>'form-control']) !!}
            </div>
        </div>
        <div class = "form-group">
            {!!Form::label('sub','Sub: ',['class'=>'control-label col-xs-offset-2 col-xs-2'])!!}
            <div class = "col-xs-5">
                {!! Form::text('sub', $product->sub, ['id' => 'sub','class'=>'form-control']) !!}
            </div>
        </div>
        <div class = "form-group">
            {!!Form::label('price','Price: ',['class'=>'control-label col-xs-offset-2 col-xs-2'])!!}
            <div class = "col-xs-5">
                {!! Form::text('price', $product->price, ['id' => 'price','class'=>'form-control']) !!}
            </div>
        </div>
        <div class = "form-group">
            {!!Form::label('sale_price','Sale price: ',['class'=>'control-label col-xs-offset-2 col-xs-2'])!!}
            <div class = "col-xs-5">
                {!! Form::text('sale_price', $product->sale_price, ['id' => 'sale_price','class'=>'form-control']) !!}
            </div>
        </div>
        <div class = "form-group">
            {!!Form::label('wPrice','W Price: ',['class'=>'control-label col-xs-offset-2 col-xs-2'])!!}
            <div class = "col-xs-5">
                {!! Form::text('wPrice', $product->wPrice, ['id' => 'wPrice','class'=>'form-control']) !!}
            </div>
        </div>
        <div class = "form-group">
            {!!Form::label('taxable','Taxable: ',['class'=>'control-label col-xs-offset-2 col-xs-2'])!!}
            <div class = "col-xs-5">
                {!! Form::select('taxable', ['Yes' => 'Yes', 'No' => 'No'], 'Yes', ['id' => 'taxable', 'class'=>'form-control']) !!}
            </div>
        </div>
        <div class = "form-group">
            {!!Form::label('upc','UPC: ',['class'=>'control-label col-xs-offset-2 col-xs-2'])!!}
            <div class = "col-xs-5">
                {!! Form::text('upc', $product->upc, ['id' => 'upc','class'=>'form-control']) !!}
            </div>
        </div>
        <div class = "form-group">
            {!!Form::label('brand','Brand: ',['class'=>'control-label col-xs-offset-2 col-xs-2'])!!}
            <div class = "col-xs-5">
                {!! Form::text('brand', $product->brand, ['id' => 'brand','class'=>'form-control']) !!}
            </div>
        </div>
        <div class = "form-group">
            {!!Form::label('ASIN','ASIN: ',['class'=>'control-label col-xs-offset-2 col-xs-2'])!!}
            <div class = "col-xs-5">
                {!! Form::text('ASIN', $product->ASIN, ['id' => 'ASIN','class'=>'form-control']) !!}
            </div>
        </div>
        <div class = "form-group">
            {!!Form::label('su_code','SU code: ',['class'=>'control-label col-xs-offset-2 col-xs-2'])!!}
            <div class = "col-xs-5">
                {!! Form::text('su_code', $product->su_code, ['id' => 'su_code','class'=>'form-control']) !!}
            </div>
        </div>
        <div class = "form-group">
            {!!Form::label('acct_code','Acct code: ',['class'=>'control-label col-xs-offset-2 col-xs-2'])!!}
            <div class = "col-xs-5">
                {!! Form::text('acct_code', $product->acct_code, ['id' => 'acct_code','class'=>'form-control']) !!}
            </div>
        </div>
        <div class = "form-group">
            {!!Form::label('product_condition','Condition: ',['class'=>'control-label col-xs-offset-2 col-xs-2'])!!}
            <div class = "col-xs-5">
                {!! Form::text('product_condition', $product->product_condition, ['id' => 'product_condition','class'=>'form-control']) !!}
            </div>
        </div>
        <div class = "form-group">
            {!!Form::label('image_url_4P','Image url 4P: ',['class'=>'control-label col-xs-offset-2 col-xs-2'])!!}
            <div class = "col-xs-5">
                {!! Form::text('image_url_4P', $product->image_url_4P, ['id' => 'image_url_4P','class'=>'form-control']) !!}
            </div>
        </div>
        <div class = "form-group">
            {!!Form::label('inset_url','Inset url: ',['class'=>'control-label col-xs-offset-2 col-xs-2'])!!}
            <div class = "col-xs-5">
                {!! Form::text('inset_url', $product->inset_url, ['id' => 'inset_url','class'=>'form-control']) !!}
            </div>
        </div>
        <div class = "form-group">
            <div class = "col-xs-offset-4 col-xs-5">
                {!! Form::submit('Update product',['class'=>'btn btn-primary btn-block']) !!}
            </div>
        </div>
        {!! Form::close() !!}

        {!! Form::open(['url' => url(sprintf('/products/%d', $product->id)), 'method' => 'delete', 'id' => 'delete-product-form', 'class'=>'form-horizontal','role'=>'form']) !!}
        <div class = "form-group">
            <div class = "col-xs-offset-4 col-xs-5">
                {!! Form::submit('Delete product', ['class'=> 'btn btn-danger btn-block', 'id' => 'delete-product-btn']) !!}
            </div>
        </div>
        {!! Form::close() !!}
    </div>
    <script type = "text/javascript" src = "//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script type = "text/javascript">
        var message = {
            delete: 'Are you sure you want to delete?',
        };
        $("input#delete-product-btn").on('click', function (event)
        {
            event.preventDefault();
            var action = confirm(message.delete);
            if ( action ) {
                var form = $("form#delete-product-form");
                form.submit();
            }
        });
    </script>
</body>
</html>