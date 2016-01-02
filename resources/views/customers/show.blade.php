<!doctype html>
<html lang = "en">
<head>
    <meta charset = "UTF-8">
    <title>Customer - {{$customer->ship_full_name}}</title>
    <link type="text/css" rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
</head>
<body>
    <div class="container" style="margin-top: 40px;">
        <a class="btn btn-success" href="{{ url(sprintf("/customers/%d/edit", $customer->id)) }}">Edit this customer</a>
        <table class="table table-bordered">
            <caption>Shipping address</caption>
            <tr>
                <td>ship_full_name</td>
                <td>{{$customer->ship_full_name}}</td>
            </tr>
            <tr>
                <td>company_name</td>
                <td>{{$customer->company_name}}</td>
            </tr>
            <tr>
                <td>first_name</td>
                <td>{{$customer->first_name}}</td>
            </tr>
            <tr>
                <td>last_name</td>
                <td>{{$customer->last_name}}</td>
            </tr>
            <tr>
                <td>shipping_address_1</td>
                <td>{{$customer->shipping_address_1}}</td>
            </tr>
            <tr>
                <td>shipping_address_2</td>
                <td>{{$customer->shipping_address_2}}</td>
            </tr>
            <tr>
                <td>ship_city</td>
                <td>{{$customer->ship_city}}</td>
            </tr>
            <tr>
                <td>ship_state</td>
                <td>{{$customer->ship_state}}</td>
            </tr>
            <tr>
                <td>ship_country</td>
                <td>{{$customer->ship_country}}</td>
            </tr>
            <tr>
                <td>ship_zip</td>
                <td>{{$customer->ship_zip}}</td>
            </tr>
            <tr>
                <td>ship_phone</td>
                <td>{{$customer->ship_phone}}</td>
            </tr>
            </table>

        <table class="table table-bordered">
            <caption>Billing address</caption>
            <tr>
                <td>bill_company_name</td>
                <td>{{$customer->bill_company_name}}</td>
            </tr>
            <tr>
                <td>bill_first_name</td>
                <td>{{$customer->bill_first_name}}</td>
            </tr>
            <tr>
                <td>bill_last_name</td>
                <td>{{$customer->bill_last_name}}</td>
            </tr>
            <tr>
                <td>bill_address_1</td>
                <td>{{$customer->bill_address_1}}</td>
            </tr>
            <tr>
                <td>bill_address_2</td>
                <td>{{$customer->bill_address_2}}</td>
            </tr>
            <tr>
                <td>bill_city</td>
                <td>{{$customer->bill_city}}</td>
            </tr>
            <tr>
                <td>bill_state</td>
                <td>{{$customer->bill_state}}</td>
            </tr>
            <tr>
                <td>bill_country</td>
                <td>{{$customer->bill_country}}</td>
            </tr>
            <tr>
                <td>bill_zip</td>
                <td>{{$customer->bill_zip}}</td>
            </tr>
            <tr>
                <td>bill_phone</td>
                <td>{{$customer->bill_phone}}</td>
            </tr>
        </table>
    </div>
</body>
</html>