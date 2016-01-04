<!doctype html>
<html lang = "en">
<head>
    <meta charset = "UTF-8">
    <title>Create order</title>
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

        {!! Form::open(['url' => url('/orders'), 'method' => 'post']) !!}
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">order_id</div>
                <div class = "col-xs-6">
                    {!! Form::text('order_id', null, ['id' => 'order_id']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">email</div>
                <div class = "col-xs-6">
                    {!! Form::text('email', null, ['id' => 'email']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">customer_id</div>
                <div class = "col-xs-6">
                    {!! Form::text('customer_id', null, ['id' => 'customer_id']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">placed_by</div>
                <div class = "col-xs-6">
                    {!! Form::text('placed_by', null, ['id' => 'placed_by']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">store_id</div>
                <div class = "col-xs-6">
                    {!! Form::text('store_id', null, ['id' => 'store_id']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">market</div>
                <div class = "col-xs-6">
                    {!! Form::text('market', null, ['id' => 'market']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">order_date</div>
                <div class = "col-xs-6">
                    {!! Form::text('order_date', null, ['id' => 'order_date']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">paid</div>
                <div class = "col-xs-6">
                    {!! Form::text('paid', null, ['id' => 'paid']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">payment_method</div>
                <div class = "col-xs-6">
                    {!! Form::text('payment_method', null, ['id' => 'payment_method']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">sub_total</div>
                <div class = "col-xs-6">
                    {!! Form::text('sub_total', null, ['id' => 'sub_total']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">shipping_cost</div>
                <div class = "col-xs-6">
                    {!! Form::text('shipping_cost', null, ['id' => 'shipping_cost']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">discount</div>
                <div class = "col-xs-6">
                    {!! Form::text('discount', null, ['id' => 'discount']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">gift_wrap_cost</div>
                <div class = "col-xs-6">
                    {!! Form::text('gift_wrap_cost', null, ['id' => 'gift_wrap_cost']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">tax</div>
                <div class = "col-xs-6">
                    {!! Form::text('tax', null, ['id' => 'tax']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">adjustment</div>
                <div class = "col-xs-6">
                    {!! Form::text('adjustment', null, ['id' => 'adjustment']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">order_total</div>
                <div class = "col-xs-6">
                    {!! Form::text('order_total', null, ['id' => 'order_total']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">fraud_score</div>
                <div class = "col-xs-6">
                    {!! Form::text('fraud_score', null, ['id' => 'fraud_score']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">coupon_name</div>
                <div class = "col-xs-6">
                    {!! Form::text('coupon_name', null, ['id' => 'coupon_name']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">shipping_method</div>
                <div class = "col-xs-6">
                    {!! Form::text('shipping_method', null, ['id' => 'shipping_method']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">four_pl_unique_id</div>
                <div class = "col-xs-6">
                    {!! Form::text('four_pl_unique_id', null, ['id' => 'four_pl_unique_id']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">short_order</div>
                <div class = "col-xs-6">
                    {!! Form::text('short_order', null, ['id' => 'short_order']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">order_comments</div>
                <div class = "col-xs-6">
                    {!! Form::text('order_comments', null, ['id' => 'order_comments']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">item_name</div>
                <div class = "col-xs-6">
                    {!! Form::text('item_name', null, ['id' => 'item_name']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">item_code</div>
                <div class = "col-xs-6">
                    {!! Form::text('item_code', null, ['id' => 'item_code']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">item_id</div>
                <div class = "col-xs-6">
                    {!! Form::text('item_id', null, ['id' => 'item_id']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">item_qty</div>
                <div class = "col-xs-6">
                    {!! Form::text('item_qty', null, ['id' => 'item_qty']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">item_price</div>
                <div class = "col-xs-6">
                    {!! Form::text('item_price', null, ['id' => 'item_price']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">item_cost</div>
                <div class = "col-xs-6">
                    {!! Form::text('item_cost', null, ['id' => 'item_cost']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">item_options</div>
                <div class = "col-xs-6">
                    {!! Form::text('item_options', null, ['id' => 'item_options']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">trk</div>
                <div class = "col-xs-6">
                    {!! Form::text('trk', null, ['id' => 'trk']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">ship_date</div>
                <div class = "col-xs-6">
                    {!! Form::text('ship_date', null, ['id' => 'ship_date']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">shipping_carrier</div>
                <div class = "col-xs-6">
                    {!! Form::text('shipping_carrier', null, ['id' => 'shipping_carrier']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">drop_shipper</div>
                <div class = "col-xs-6">
                    {!! Form::text('drop_shipper', null, ['id' => 'drop_shipper']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">return_request_code</div>
                <div class = "col-xs-6">
                    {!! Form::text('return_request_code', null, ['id' => 'return_request_code']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">return_request_date</div>
                <div class = "col-xs-6">
                    {!! Form::text('return_request_date', null, ['id' => 'return_request_date']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">return_disposition_code</div>
                <div class = "col-xs-6">
                    {!! Form::text('return_disposition_code', null, ['id' => 'return_disposition_code']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">return_date</div>
                <div class = "col-xs-6">
                    {!! Form::text('return_date', null, ['id' => 'return_date']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">rma</div>
                <div class = "col-xs-6">
                    {!! Form::text('rma', null, ['id' => 'rma']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">d_s_purchase_order</div>
                <div class = "col-xs-6">
                    {!! Form::text('d_s_purchase_order', null, ['id' => 'd_s_purchase_order']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">wf_batch</div>
                <div class = "col-xs-6">
                    {!! Form::text('wf_batch', null, ['id' => 'wf_batch']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">order_status</div>
                <div class = "col-xs-6">
                    {!! Form::text('order_status', null, ['id' => 'order_status']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">source</div>
                <div class = "col-xs-6">
                    {!! Form::text('source', null, ['id' => 'source']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">cancel_code</div>
                <div class = "col-xs-6">
                    {!! Form::text('cancel_code', null, ['id' => 'cancel_code']) !!}
                </div>
            </div>

            <div class = "col-xs-12 apply-margin-top-bottom">
            <div class = "col-xs-6">
                {!! Form::submit('Create order') !!}
            </div>
        </div>

        {!! Form::close() !!}
    </div>
</body>
</html>