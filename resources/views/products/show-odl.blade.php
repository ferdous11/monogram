<!doctype html>
<html lang = "en">
<head>
    <meta charset = "UTF-8">
    <title>Product - {{$product->product_name}}</title>
    <link type = "text/css" rel = "stylesheet"
          href = "//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
</head>
<body>
    <div class = "container" style = "margin-top: 50px;">
        <a href = "{{ url(sprintf("/products/%d/edit", $product->id)) }}" class="btn btn-success">Edit this product</a>
        <table class = "table table-bordered">
            <caption>Product details</caption>
            <tr>
                <td>storeId</td>
                <td>{{$product->storeId}}</td>
            </tr>
            <tr>
                <td>idCatalog</td>
                <td>{{$product->idCatalog}}</td>
            </tr>
            <tr>
                <td>vendorId</td>
                <td>{{$product->vendorId}}</td>
            </tr>
            <tr>
                <td>model</td>
                <td>{{$product->model}}</td>
            </tr>
            <tr>
                <td>product_url</td>
                <td><a href="{{$product->product_url}}">{{$product->product_url}}</a></td>
            </tr>
            <tr>
                <td>product_name</td>
                <td>{{$product->product_name}}</td>
            </tr>
            <tr>
                <td>ship_weight</td>
                <td>{{$product->ship_weight}}</td>
            </tr>
            <tr>
                <td>productCost</td>
                <td>{{$product->productCost}}</td>
            </tr>
            <tr>
                <td>mcategory</td>
                <td>{{$product->mcategory}}</td>
            </tr>
            <tr>
                <td>cat</td>
                <td>{{$product->cat}}</td>
            </tr>
            <tr>
                <td>sub</td>
                <td>{{$product->sub}}</td>
            </tr>
            <tr>
                <td>price</td>
                <td>{{$product->price}}</td>
            </tr>
            <tr>
                <td>sale_price</td>
                <td>{{$product->sale_price}}</td>
            </tr>
            <tr>
                <td>wPrice</td>
                <td>{{$product->wPrice}}</td>
            </tr>
            <tr>
                <td>active</td>
                <td>{{$product->active == 0 ? "Inactive" : "Active" }}</td>
            </tr>
            <tr>
                <td>taxable</td>
                <td>{{$product->taxable}}</td>
            </tr>
            <tr>
                <td>upc</td>
                <td>{{$product->upc}}</td>
            </tr>
            <tr>
                <td>brand</td>
                <td>{{$product->brand}}</td>
            </tr>
            <tr>
                <td>ASIN</td>
                <td>{{$product->ASIN}}</td>
            </tr>
            <tr>
                <td>su_code</td>
                <td>{{$product->su_code}}</td>
            </tr>
            <tr>
                <td>acct_code</td>
                <td>{{$product->acct_code}}</td>
            </tr>
            <tr>
                <td>condition</td>
                <td>{{$product->condition}}</td>
            </tr>
            <tr>
                <td>image_url_4P</td>
                <td><a href="{{$product->image_url_4P}}">{{$product->image_url_4P}}</a></td>
            </tr>
            <tr>
                <td>inset_url</td>
                <td><a href="{{$product->inset_url}}">{{$product->inset_url}}</a></td>
            </tr>
        </table>
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