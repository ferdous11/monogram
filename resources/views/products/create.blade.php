<!doctype html>
<html lang = "en">
<head>
    <meta charset = "UTF-8">
    <title>Add product</title>
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

        {!! Form::open(['url' => url('/products'), 'method' => 'post']) !!}
        <div class = "col-xs-12 apply-margin-top-bottom">
            <div class = "col-xs-3">storeId</div>
            <div class = "col-xs-6">
                {!! Form::text('storeId', null, ['id' => 'storeId']) !!}
            </div>
        </div>
        <div class = "col-xs-12 apply-margin-top-bottom">
            <div class = "col-xs-3">idCatalog</div>
            <div class = "col-xs-6">
                {!! Form::text('idCatalog', null, ['id' => 'idCatalog']) !!}
            </div>
        </div>
        <div class = "col-xs-12 apply-margin-top-bottom">
            <div class = "col-xs-3">vendorId</div>
            <div class = "col-xs-6">
                {!! Form::text('vendorId', null, ['id' => 'vendorId']) !!}
            </div>
        </div>
        <div class = "col-xs-12 apply-margin-top-bottom">
            <div class = "col-xs-3">model</div>
            <div class = "col-xs-6">
                {!! Form::text('model', null, ['id' => 'model']) !!}
            </div>
        </div>
        <div class = "col-xs-12 apply-margin-top-bottom">
            <div class = "col-xs-3">product_url</div>
            <div class = "col-xs-6">
                {!! Form::text('product_url', null, ['id' => 'product_url']) !!}
            </div>
        </div>
        <div class = "col-xs-12 apply-margin-top-bottom">
            <div class = "col-xs-3">product_name</div>
            <div class = "col-xs-6">
                {!! Form::text('product_name', null, ['id' => 'product_name']) !!}
            </div>
        </div>
        <div class = "col-xs-12 apply-margin-top-bottom">
            <div class = "col-xs-3">ship_weight</div>
            <div class = "col-xs-6">
                {!! Form::text('ship_weight', null, ['id' => 'ship_weight']) !!}
            </div>
        </div>
        <div class = "col-xs-12 apply-margin-top-bottom">
            <div class = "col-xs-3">productCost</div>
            <div class = "col-xs-6">
                {!! Form::text('productCost', null, ['id' => 'productCost']) !!}
            </div>
        </div>
        <div class = "col-xs-12 apply-margin-top-bottom">
            <div class = "col-xs-3">mcategory</div>
            <div class = "col-xs-6">
                {!! Form::text('mcategory', null, ['id' => 'mcategory']) !!}
            </div>
        </div>
        <div class = "col-xs-12 apply-margin-top-bottom">
            <div class = "col-xs-3">cat</div>
            <div class = "col-xs-6">
                {!! Form::text('cat', null, ['id' => 'cat']) !!}
            </div>
        </div>
        <div class = "col-xs-12 apply-margin-top-bottom">
            <div class = "col-xs-3">sub</div>
            <div class = "col-xs-6">
                {!! Form::text('sub', null, ['id' => 'sub']) !!}
            </div>
        </div>
        <div class = "col-xs-12 apply-margin-top-bottom">
            <div class = "col-xs-3">price</div>
            <div class = "col-xs-6">
                {!! Form::text('price', null, ['id' => 'price']) !!}
            </div>
        </div>
        <div class = "col-xs-12 apply-margin-top-bottom">
            <div class = "col-xs-3">sale_price</div>
            <div class = "col-xs-6">
                {!! Form::text('sale_price', null, ['id' => 'sale_price']) !!}
            </div>
        </div>
        <div class = "col-xs-12 apply-margin-top-bottom">
            <div class = "col-xs-3">wPrice</div>
            <div class = "col-xs-6">
                {!! Form::text('wPrice', null, ['id' => 'wPrice']) !!}
            </div>
        </div>
        <div class = "col-xs-12 apply-margin-top-bottom">
            <div class = "col-xs-3">taxable</div>
            <div class = "col-xs-6">
                {!! Form::select('taxable', ['Yes' => 'Yes', 'No' => 'No'], 'Yes', ['id' => 'taxable']) !!}
            </div>
        </div>
        <div class = "col-xs-12 apply-margin-top-bottom">
            <div class = "col-xs-3">upc</div>
            <div class = "col-xs-6">
                {!! Form::text('upc', null, ['id' => 'upc']) !!}
            </div>
        </div>
        <div class = "col-xs-12 apply-margin-top-bottom">
            <div class = "col-xs-3">brand</div>
            <div class = "col-xs-6">
                {!! Form::text('brand', null, ['id' => 'brand']) !!}
            </div>
        </div>
        <div class = "col-xs-12 apply-margin-top-bottom">
            <div class = "col-xs-3">ASIN</div>
            <div class = "col-xs-6">
                {!! Form::text('ASIN', null, ['id' => 'ASIN']) !!}
            </div>
        </div>
        <div class = "col-xs-12 apply-margin-top-bottom">
            <div class = "col-xs-3">su_code</div>
            <div class = "col-xs-6">
                {!! Form::text('su_code', null, ['id' => 'su_code']) !!}
            </div>
        </div>
        <div class = "col-xs-12 apply-margin-top-bottom">
            <div class = "col-xs-3">acct_code</div>
            <div class = "col-xs-6">
                {!! Form::text('acct_code', null, ['id' => 'acct_code']) !!}
            </div>
        </div>
        <div class = "col-xs-12 apply-margin-top-bottom">
            <div class = "col-xs-3">condition</div>
            <div class = "col-xs-6">
                {!! Form::text('condition', null, ['id' => 'condition']) !!}
            </div>
        </div>
        <div class = "col-xs-12 apply-margin-top-bottom">
            <div class = "col-xs-3">image_url_4P</div>
            <div class = "col-xs-6">
                {!! Form::text('image_url_4P', null, ['id' => 'image_url_4P']) !!}
            </div>
        </div>
        <div class = "col-xs-12 apply-margin-top-bottom">
            <div class = "col-xs-3">inset_url</div>
            <div class = "col-xs-6">
                {!! Form::text('inset_url', null, ['id' => 'inset_url']) !!}
            </div>
        </div>

        <div class = "col-xs-12 apply-margin-top-bottom">
            <div class = "col-xs-6">
                {!! Form::submit('Add product') !!}
            </div>
        </div>

        {!! Form::close() !!}
    </div>
</body>
</html>