<!doctype html>
<html lang = "en">
<head>
    <meta charset = "UTF-8">
    <title>Product - {{$product->product_name}}</title>
    <meta name = "viewport" content = "width=device-width, initial-scale=1">
    <link type = "text/css" rel = "stylesheet"
          href = "//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <link type = "text/css" rel = "stylesheet"
          href = "//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
</head>
<body>
    @include('includes.header_menu')
    <div class = "container">
        <ol class="breadcrumb">
            <li><a href="{{url('/')}}">Home</a></li>
            <li><a href="{{url('products')}}">Products</a></li>
            <li class="active">View product</li>
        </ol>
        <div class = "col-xs-offset-1 col-xs-10 col-xs-offset-1">
            <h4 class = "page-header">Product details</h4>
            <table class = "table table-hover table-bordered">
                <tr class = "success">
                    <td>Store Id</td>
                    <td>{{$product->storeId}}</td>
                </tr>
                <tr>
                    <td>ID Catalog</td>
                    <td>{{$product->idCatalog}}</td>
                </tr>
                <tr class = "success">
                    <td>Vendor Id</td>
                    <td>{{$product->vendorId}}</td>
                </tr>
                <tr>
                    <td>Model</td>
                    <td>{{$product->model}}</td>
                </tr>
                <tr class = "success">
                    <td>Product url</td>
                    <td><a href = "{{$product->product_url}}">{{$product->product_url}}</a></td>
                </tr>
                <tr>
                    <td>Product Name</td>
                    <td>{{$product->product_name}}</td>
                </tr>
                <tr class = "success">
                    <td>Ship Weight</td>
                    <td>{{$product->ship_weight}}</td>
                </tr>
                <tr>
                    <td>Product Cost</td>
                    <td>{{$product->productCost}}</td>
                </tr>
                <tr class = "success">
                    <td>M category</td>
                    <td>{{$product->mcategory}}</td>
                </tr>
                <tr>
                    <td>Cat</td>
                    <td>{{$product->cat}}</td>
                </tr>
                <tr class = "success">
                    <td>Sub</td>
                    <td>{{$product->sub}}</td>
                </tr>
                <tr>
                    <td>Price</td>
                    <td>{{$product->price}}</td>
                </tr>
                <tr class = "success">
                    <td>Sale Price</td>
                    <td>{{$product->sale_price}}</td>
                </tr>
                <tr>
                    <td>W Price</td>
                    <td>{{$product->wPrice}}</td>
                </tr>
                <tr class = "success">
                    <td>Active</td>
                    <td>{{$product->active == 0 ? "Inactive" : "Active" }}</td>
                </tr>
                <tr>
                    <td>Taxable</td>
                    <td>{{$product->taxable}}</td>
                </tr>
                <tr class = "success">
                    <td>UPC</td>
                    <td>{{$product->upc}}</td>
                </tr>
                <tr>
                    <td>Brand</td>
                    <td>{{$product->brand}}</td>
                </tr>
                <tr class = "success">
                    <td>ASIN</td>
                    <td>{{$product->ASIN}}</td>
                </tr>
                <tr>
                    <td>SU Code</td>
                    <td>{{$product->su_code}}</td>
                </tr>
                <tr class = "success">
                    <td>Acct Code</td>
                    <td>{{$product->acct_code}}</td>
                </tr>
                <tr>
                    <td>Condition</td>
                    <td>{{$product->product_condition}}</td>
                </tr>
                <tr class = "success">
                    <td>Image url 4P</td>
                    <td><a href = "{{$product->image_url_4P}}">{{$product->image_url_4P}}</a></td>
                </tr>
                <tr>
                    <td>Inset url</td>
                    <td><a href = "{{$product->inset_url}}">{{$product->inset_url}}</a></td>
                </tr>
            </table>
        </div>
        <div class = "col-xs-12" style = "margin-bottom: 30px;">
            <div class = "col-xs-offset-1 col-xs-10" style="margin-bottom: 10px;">
                <a href = "{{ url(sprintf("/products/%d/edit", $product->id)) }}" class = "btn btn-success btn-block">Edit this
                                                                                                            product</a>
            </div>
            <div class = "col-xs-offset-1 col-xs-10">
                {!! Form::open(['url' => url(sprintf('/products/%d', $product->id)), 'method' => 'delete', 'id' => 'delete-product-form']) !!}
                {!! Form::submit('Delete product', ['class'=> 'btn btn-danger btn-block', 'id' => 'delete-product-btn']) !!}
                {!! Form::close() !!}
            </div>
        </div>
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