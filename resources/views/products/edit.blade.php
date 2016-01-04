<!doctype html>
<html lang = "en">
<head>
    <meta charset = "UTF-8">
    <title>Edit Product - {{ $product->product_name}}</title>
    <link type = "text/css" rel = "stylesheet"
          href = "//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
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

        {!! Form::open(['url' => url(sprintf("/products/%d", $product->id)), 'method' => 'put']) !!}
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">storeId</div>
                <div class = "col-xs-6">
                    {!! Form::text('storeId', $product->storeId, ['id' => 'storeId']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">idCatalog</div>
                <div class = "col-xs-6">
                    {!! Form::text('idCatalog', $product->idCatalog, ['id' => 'idCatalog']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">vendorId</div>
                <div class = "col-xs-6">
                    {!! Form::text('vendorId', $product->vendorId, ['id' => 'vendorId']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">model</div>
                <div class = "col-xs-6">
                    {!! Form::text('model', $product->model, ['id' => 'model']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">product_url</div>
                <div class = "col-xs-6">
                    {!! Form::text('product_url', $product->product_url, ['id' => 'product_url']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">product_name</div>
                <div class = "col-xs-6">
                    {!! Form::text('product_name', $product->product_name, ['id' => 'product_name']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">ship_weight</div>
                <div class = "col-xs-6">
                    {!! Form::text('ship_weight', $product->ship_weight, ['id' => 'ship_weight']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">productCost</div>
                <div class = "col-xs-6">
                    {!! Form::text('productCost', $product->productCost, ['id' => 'productCost']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">mcategory</div>
                <div class = "col-xs-6">
                    {!! Form::text('mcategory', $product->mcategory, ['id' => 'mcategory']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">cat</div>
                <div class = "col-xs-6">
                    {!! Form::text('cat', $product->cat, ['id' => 'cat']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">sub</div>
                <div class = "col-xs-6">
                    {!! Form::text('sub', $product->sub, ['id' => 'sub']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">price</div>
                <div class = "col-xs-6">
                    {!! Form::text('price', $product->price, ['id' => 'price']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">sale_price</div>
                <div class = "col-xs-6">
                    {!! Form::text('sale_price', $product->sale_price, ['id' => 'sale_price']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">wPrice</div>
                <div class = "col-xs-6">
                    {!! Form::text('wPrice', $product->wPrice, ['id' => 'wPrice']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">taxable</div>
                <div class = "col-xs-6">
                    {!! Form::select('taxable', ['Yes' => 'Yes', 'No' => 'No'], $product->taxable, ['id' => 'taxable']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">upc</div>
                <div class = "col-xs-6">
                    {!! Form::text('upc', $product->upc, ['id' => 'upc']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">brand</div>
                <div class = "col-xs-6">
                    {!! Form::text('brand', $product->brand, ['id' => 'brand']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">ASIN</div>
                <div class = "col-xs-6">
                    {!! Form::text('ASIN', $product->ASIN, ['id' => 'ASIN']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">su_code</div>
                <div class = "col-xs-6">
                    {!! Form::text('su_code', $product->su_code, ['id' => 'su_code']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">acct_code</div>
                <div class = "col-xs-6">
                    {!! Form::text('acct_code', $product->acct_code, ['id' => 'acct_code']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">condition</div>
                <div class = "col-xs-6">
                    {!! Form::text('condition', $product->condition, ['id' => 'condition']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">image_url_4P</div>
                <div class = "col-xs-6">
                    {!! Form::text('image_url_4P', $product->image_url_4P, ['id' => 'image_url_4P']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">inset_url</div>
                <div class = "col-xs-6">
                    {!! Form::text('inset_url', $product->inset_url, ['id' => 'inset_url']) !!}
                </div>
            </div>
        <div class = "col-xs-12 apply-margin-top-bottom">
            <div class = "col-xs-6">
                {!! Form::submit('Update') !!}
            </div>
        </div>

        {!! Form::close() !!}

        {!! Form::open(['url' => url(sprintf('/products/%d', $product->id)), 'method' => 'delete', 'id' => 'delete-product-form']) !!}
        {!! Form::submit('Delete product', ['class'=> 'btn btn-danger', 'id' => 'delete-product-btn']) !!}
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