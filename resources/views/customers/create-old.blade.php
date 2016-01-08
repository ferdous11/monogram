<!doctype html>
<html lang = "en">
<head>
    <meta charset = "UTF-8">
    <title>Create Customer</title>
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
        {!! Form::open(['url' => url('/customers'), 'method' => 'post']) !!}
        <div class = "col-xs-12 apply-margin-top-bottom">
            <div class = "col-xs-3">ship_full_name</div>
            <div class = "col-xs-6">
                {!! Form::text('ship_full_name', null, ['id' => 'ship_full_name']) !!}
            </div>
        </div>
        <div class = "col-xs-12 apply-margin-top-bottom">
            <div class = "col-xs-3">company_name</div>
            <div class = "col-xs-6">
                {!! Form::text('company_name', null, ['id' => 'company_name']) !!}
            </div>
        </div>
        <div class = "col-xs-12 apply-margin-top-bottom">
            <div class = "col-xs-3">first_name</div>
            <div class = "col-xs-6">
                {!! Form::text('first_name', null, ['id' => 'first_name']) !!}
            </div>
        </div>
        <div class = "col-xs-12 apply-margin-top-bottom">
            <div class = "col-xs-3">last_name</div>
            <div class = "col-xs-6">
                {!! Form::text('last_name', null, ['id' => 'last_name']) !!}
            </div>
        </div>
        <div class = "col-xs-12 apply-margin-top-bottom">
            <div class = "col-xs-3">shipping_address_1</div>
            <div class = "col-xs-6">
                {!! Form::text('shipping_address_1', null, ['id' => 'shipping_address_1']) !!}
            </div>
        </div>
        <div class = "col-xs-12 apply-margin-top-bottom">
            <div class = "col-xs-3">shipping_address_2</div>
            <div class = "col-xs-6">
                {!! Form::text('shipping_address_2', null, ['id' => 'shipping_address_2']) !!}
            </div>
        </div>
        <div class = "col-xs-12 apply-margin-top-bottom">
            <div class = "col-xs-3">ship_city</div>
            <div class = "col-xs-6">
                {!! Form::text('ship_city', null, ['id' => 'ship_city']) !!}
            </div>
        </div>
        <div class = "col-xs-12 apply-margin-top-bottom">
            <div class = "col-xs-3">ship_state</div>
            <div class = "col-xs-6">
                {!! Form::text('ship_state', null, ['id' => 'ship_state']) !!}
            </div>
        </div>
        <div class = "col-xs-12 apply-margin-top-bottom">
            <div class = "col-xs-3">ship_country</div>
            <div class = "col-xs-6">
                {!! Form::text('ship_country', null, ['id' => 'ship_country']) !!}
            </div>
        </div>
        <div class = "col-xs-12 apply-margin-top-bottom">
            <div class = "col-xs-3">ship_zip</div>
            <div class = "col-xs-6">
                {!! Form::text('ship_zip', null, ['id' => 'ship_zip']) !!}
            </div>
        </div>
        <div class = "col-xs-12 apply-margin-top-bottom">
            <div class = "col-xs-3">ship_phone</div>
            <div class = "col-xs-6">
                {!! Form::text('ship_phone', null, ['id' => 'ship_phone']) !!}
            </div>
        </div>
        <div class = "col-xs-12 apply-margin-top-bottom">
            <div class = "col-xs-3">same_as_shipping</div>
            <div class = "col-xs-6">
                {!! Form::checkbox('same_as_shipping', true, false, ['id' => 'same_as_billing']) !!} same as shipping
            </div>
        </div>
        <div class = "col-xs-12 apply-margin-top-bottom">
            <div class = "col-xs-3">bill_company_name</div>
            <div class = "col-xs-6">
                {!! Form::text('bill_company_name', null, ['id' => 'bill_company_name']) !!}
            </div>
        </div>
        <div class = "col-xs-12 apply-margin-top-bottom">
            <div class = "col-xs-3">bill_first_name</div>
            <div class = "col-xs-6">
                {!! Form::text('bill_first_name', null, ['id' => 'bill_first_name']) !!}
            </div>
        </div>
        <div class = "col-xs-12 apply-margin-top-bottom">
            <div class = "col-xs-3">bill_last_name</div>
            <div class = "col-xs-6">
                {!! Form::text('bill_last_name', null, ['id' => 'bill_last_name']) !!}
            </div>
        </div>
        <div class = "col-xs-12 apply-margin-top-bottom">
            <div class = "col-xs-3">bill_address_1</div>
            <div class = "col-xs-6">
                {!! Form::text('bill_address_1', null, ['id' => 'bill_address_1']) !!}
            </div>
        </div>
        <div class = "col-xs-12 apply-margin-top-bottom">
            <div class = "col-xs-3">bill_address_2</div>
            <div class = "col-xs-6">
                {!! Form::text('bill_address_2', null, ['id' => 'bill_address_2']) !!}
            </div>
        </div>
        <div class = "col-xs-12 apply-margin-top-bottom">
            <div class = "col-xs-3">bill_city</div>
            <div class = "col-xs-6">
                {!! Form::text('bill_city', null, ['id' => 'bill_city']) !!}
            </div>
        </div>
        <div class = "col-xs-12 apply-margin-top-bottom">
            <div class = "col-xs-3">bill_state</div>
            <div class = "col-xs-6">
                {!! Form::text('bill_state', null, ['id' => 'bill_state']) !!}
            </div>
        </div>
        <div class = "col-xs-12 apply-margin-top-bottom">
            <div class = "col-xs-3">bill_country</div>
            <div class = "col-xs-6">
                {!! Form::text('bill_country', null, ['id' => 'bill_country']) !!}
            </div>
        </div>
        <div class = "col-xs-12 apply-margin-top-bottom">
            <div class = "col-xs-3">bill_zip</div>
            <div class = "col-xs-6">
                {!! Form::text('bill_zip', null, ['id' => 'bill_zip']) !!}
            </div>
        </div>
        <div class = "col-xs-12 apply-margin-top-bottom">
            <div class = "col-xs-3">bill_phone</div>
            <div class = "col-xs-6">
                {!! Form::text('bill_phone', null, ['id' => 'bill_phone']) !!}
            </div>
        </div>
        <div class = "col-xs-12 apply-margin-top-bottom">
            <div class = "col-xs-6">
                {!! Form::submit('Create customer') !!}
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</body>
</html>