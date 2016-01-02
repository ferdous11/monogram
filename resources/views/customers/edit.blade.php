<!doctype html>
<html lang = "en">
<head>
    <meta charset = "UTF-8">
    <title>Edit Customer - {{$customer->ship_full_name}}</title>
    <link type = "text/css" rel = "stylesheet"
          href = "//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <style>
        div.apply-margin-top-bottom {
            margin: 5px;
        }
    </style>
</head>
<body>
    <div class = "container">
        {!! Form::open(['url' => url(sprintf("/customers/%d", $customer->id)), 'method' => 'put']) !!}
        <div class = "col-xs-12 apply-margin-top-bottom">
            <div class = "col-xs-3">ship_full_name</div>
            <div class = "col-xs-6">
                {!! Form::text('ship_full_name', $customer->ship_full_name, ['id' => 'ship_full_name']) !!}
            </div>
        </div>
        <div class = "col-xs-12 apply-margin-top-bottom">
            <div class = "col-xs-3">company_name</div>
            <div class = "col-xs-6">
                {!! Form::text('company_name', $customer->company_name, ['id' => 'company_name']) !!}
            </div>
        </div>
        <div class = "col-xs-12 apply-margin-top-bottom">
            <div class = "col-xs-3">first_name</div>
            <div class = "col-xs-6">
                {!! Form::text('first_name', $customer->first_name, ['id' => 'first_name']) !!}
            </div>
        </div>
        <div class = "col-xs-12 apply-margin-top-bottom">
            <div class = "col-xs-3">last_name</div>
            <div class = "col-xs-6">
                {!! Form::text('last_name', $customer->last_name, ['id' => 'last_name']) !!}
            </div>
        </div>
        <div class = "col-xs-12 apply-margin-top-bottom">
            <div class = "col-xs-3">shipping_address_1</div>
            <div class = "col-xs-6">
                {!! Form::text('shipping_address_1', $customer->shipping_address_1, ['id' => 'shipping_address_1']) !!}
            </div>
        </div>
        <div class = "col-xs-12 apply-margin-top-bottom">
            <div class = "col-xs-3">shipping_address_2</div>
            <div class = "col-xs-6">
                {!! Form::text('shipping_address_2', $customer->shipping_address_2, ['id' => 'shipping_address_2']) !!}
            </div>
        </div>
        <div class = "col-xs-12 apply-margin-top-bottom">
            <div class = "col-xs-3">ship_city</div>
            <div class = "col-xs-6">
                {!! Form::text('ship_city', $customer->ship_city, ['id' => 'ship_city']) !!}
            </div>
        </div>
        <div class = "col-xs-12 apply-margin-top-bottom">
            <div class = "col-xs-3">ship_state</div>
            <div class = "col-xs-6">
                {!! Form::text('ship_state', $customer->ship_state, ['id' => 'ship_state']) !!}
            </div>
        </div>
        <div class = "col-xs-12 apply-margin-top-bottom">
            <div class = "col-xs-3">ship_country</div>
            <div class = "col-xs-6">
                {!! Form::text('ship_country', $customer->ship_country, ['id' => 'ship_country']) !!}
            </div>
        </div>
        <div class = "col-xs-12 apply-margin-top-bottom">
            <div class = "col-xs-3">ship_zip</div>
            <div class = "col-xs-6">
                {!! Form::text('ship_zip', $customer->ship_zip, ['id' => 'ship_zip']) !!}
            </div>
        </div>
        <div class = "col-xs-12 apply-margin-top-bottom">
            <div class = "col-xs-3">ship_phone</div>
            <div class = "col-xs-6">
                {!! Form::text('ship_phone', $customer->ship_phone, ['id' => 'ship_phone']) !!}
            </div>
        </div>
        <div class = "col-xs-12 apply-margin-top-bottom">
            <div class = "col-xs-3">bill_company_name</div>
            <div class = "col-xs-6">
                {!! Form::text('bill_company_name', $customer->bill_company_name, ['id' => 'bill_company_name']) !!}
            </div>
        </div>
        <div class = "col-xs-12 apply-margin-top-bottom">
            <div class = "col-xs-3">bill_first_name</div>
            <div class = "col-xs-6">
                {!! Form::text('bill_first_name', $customer->bill_first_name, ['id' => 'bill_first_name']) !!}
            </div>
        </div>
        <div class = "col-xs-12 apply-margin-top-bottom">
            <div class = "col-xs-3">bill_last_name</div>
            <div class = "col-xs-6">
                {!! Form::text('bill_last_name', $customer->bill_last_name, ['id' => 'bill_last_name']) !!}
            </div>
        </div>
        <div class = "col-xs-12 apply-margin-top-bottom">
            <div class = "col-xs-3">bill_address_1</div>
            <div class = "col-xs-6">
                {!! Form::text('bill_address_1', $customer->bill_address_1, ['id' => 'bill_address_1']) !!}
            </div>
        </div>
        <div class = "col-xs-12 apply-margin-top-bottom">
            <div class = "col-xs-3">bill_address_2</div>
            <div class = "col-xs-6">
                {!! Form::text('bill_address_2', $customer->bill_address_2, ['id' => 'bill_address_2']) !!}
            </div>
        </div>
        <div class = "col-xs-12 apply-margin-top-bottom">
            <div class = "col-xs-3">bill_city</div>
            <div class = "col-xs-6">
                {!! Form::text('bill_city', $customer->bill_city, ['id' => 'bill_city']) !!}
            </div>
        </div>
        <div class = "col-xs-12 apply-margin-top-bottom">
            <div class = "col-xs-3">bill_state</div>
            <div class = "col-xs-6">
                {!! Form::text('bill_state', $customer->bill_state, ['id' => 'bill_state']) !!}
            </div>
        </div>
        <div class = "col-xs-12 apply-margin-top-bottom">
            <div class = "col-xs-3">bill_country</div>
            <div class = "col-xs-6">
                {!! Form::text('bill_country', $customer->bill_country, ['id' => 'bill_country']) !!}
            </div>
        </div>
        <div class = "col-xs-12 apply-margin-top-bottom">
            <div class = "col-xs-3">bill_zip</div>
            <div class = "col-xs-6">
                {!! Form::text('bill_zip', $customer->bill_zip, ['id' => 'bill_zip']) !!}
            </div>
        </div>
        <div class = "col-xs-12 apply-margin-top-bottom">
            <div class = "col-xs-3">bill_phone</div>
            <div class = "col-xs-6">
                {!! Form::text('bill_phone', $customer->bill_phone, ['id' => 'bill_phone']) !!}
            </div>
        </div>
        <div class = "col-xs-12 apply-margin-top-bottom">
            <div class = "col-xs-6">
                {!! Form::submit('Update customer') !!}
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</body>
</html>