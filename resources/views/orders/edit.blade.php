<!doctype html>
<html lang = "en">
<head>
    <meta charset = "UTF-8">
    <title>Edit order. Ordered by - {{ $order->email}}</title>
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

        {!! Form::open(['url' => url(sprintf("/orders/%d", $order->id)), 'method' => 'put']) !!}
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">order_id</div>
                <div class = "col-xs-6">
                    {!! Form::text('order_id', $order->order_id, ['id' => 'order_id']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">email</div>
                <div class = "col-xs-6">
                    {!! Form::text('email', $order->email, ['id' => 'email']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">customer_id</div>
                <div class = "col-xs-6">
                    {!! Form::text('customer_id', $order->customer_id, ['id' => 'customer_id']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">placed_by</div>
                <div class = "col-xs-6">
                    {!! Form::text('placed_by', $order->placed_by, ['id' => 'placed_by']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">store_id</div>
                <div class = "col-xs-6">
                    {!! Form::text('store_id', $order->store_id, ['id' => 'store_id']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">market</div>
                <div class = "col-xs-6">
                    {!! Form::text('market', $order->market, ['id' => 'market']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">order_date</div>
                <div class = "col-xs-6">
                    {!! Form::text('order_date', $order->order_date, ['id' => 'order_date']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">paid</div>
                <div class = "col-xs-6">
                    {!! Form::text('paid', $order->paid, ['id' => 'paid']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">payment_method</div>
                <div class = "col-xs-6">
                    {!! Form::text('payment_method', $order->payment_method, ['id' => 'payment_method']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">sub_total</div>
                <div class = "col-xs-6">
                    {!! Form::text('sub_total', $order->sub_total, ['id' => 'sub_total']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">shipping_cost</div>
                <div class = "col-xs-6">
                    {!! Form::text('shipping_cost', $order->shipping_cost, ['id' => 'shipping_cost']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">discount</div>
                <div class = "col-xs-6">
                    {!! Form::text('discount', $order->discount, ['id' => 'discount']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">gift_wrap_cost</div>
                <div class = "col-xs-6">
                    {!! Form::text('gift_wrap_cost', $order->gift_wrap_cost, ['id' => 'gift_wrap_cost']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">tax</div>
                <div class = "col-xs-6">
                    {!! Form::text('tax', $order->tax, ['id' => 'tax']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">adjustment</div>
                <div class = "col-xs-6">
                    {!! Form::text('adjustment', $order->adjustment, ['id' => 'adjustment']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">order_total</div>
                <div class = "col-xs-6">
                    {!! Form::text('order_total', $order->order_total, ['id' => 'order_total']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">fraud_score</div>
                <div class = "col-xs-6">
                    {!! Form::text('fraud_score', $order->fraud_score, ['id' => 'fraud_score']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">coupon_name</div>
                <div class = "col-xs-6">
                    {!! Form::text('coupon_name', $order->coupon_name, ['id' => 'coupon_name']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">shipping_method</div>
                <div class = "col-xs-6">
                    {!! Form::text('shipping_method', $order->shipping_method, ['id' => 'shipping_method']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">four_pl_unique_id</div>
                <div class = "col-xs-6">
                    {!! Form::text('four_pl_unique_id', $order->four_pl_unique_id, ['id' => 'four_pl_unique_id']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">short_order</div>
                <div class = "col-xs-6">
                    {!! Form::text('short_order', $order->short_order, ['id' => 'short_order']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">order_comments</div>
                <div class = "col-xs-6">
                    {!! Form::text('order_comments', $order->order_comments, ['id' => 'order_comments']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">item_name</div>
                <div class = "col-xs-6">
                    {!! Form::text('item_name', $order->item_name, ['id' => 'item_name']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">item_code</div>
                <div class = "col-xs-6">
                    {!! Form::text('item_code', $order->item_code, ['id' => 'item_code']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">item_id</div>
                <div class = "col-xs-6">
                    {!! Form::text('item_id', $order->item_id, ['id' => 'item_id']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">item_qty</div>
                <div class = "col-xs-6">
                    {!! Form::text('item_qty', $order->item_qty, ['id' => 'item_qty']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">item_price</div>
                <div class = "col-xs-6">
                    {!! Form::text('item_price', $order->item_price, ['id' => 'item_price']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">item_cost</div>
                <div class = "col-xs-6">
                    {!! Form::text('item_cost', $order->item_cost, ['id' => 'item_cost']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">item_options</div>
                <div class = "col-xs-6">
                    {!! Form::text('item_options', $order->item_options, ['id' => 'item_options']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">trk</div>
                <div class = "col-xs-6">
                    {!! Form::text('trk', $order->trk, ['id' => 'trk']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">ship_date</div>
                <div class = "col-xs-6">
                    {!! Form::text('ship_date', $order->ship_date, ['id' => 'ship_date']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">shipping_carrier</div>
                <div class = "col-xs-6">
                    {!! Form::text('shipping_carrier', $order->shipping_carrier, ['id' => 'shipping_carrier']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">drop_shipper</div>
                <div class = "col-xs-6">
                    {!! Form::text('drop_shipper', $order->drop_shipper, ['id' => 'drop_shipper']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">return_request_code</div>
                <div class = "col-xs-6">
                    {!! Form::text('return_request_code', $order->return_request_code, ['id' => 'return_request_code']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">return_request_date</div>
                <div class = "col-xs-6">
                    {!! Form::text('return_request_date', $order->return_request_date, ['id' => 'return_request_date']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">return_disposition_code</div>
                <div class = "col-xs-6">
                    {!! Form::text('return_disposition_code', $order->return_disposition_code, ['id' => 'return_disposition_code']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">return_date</div>
                <div class = "col-xs-6">
                    {!! Form::text('return_date', $order->return_date, ['id' => 'return_date']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">rma</div>
                <div class = "col-xs-6">
                    {!! Form::text('rma', $order->rma, ['id' => 'rma']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">d_s_purchase_order</div>
                <div class = "col-xs-6">
                    {!! Form::text('d_s_purchase_order', $order->d_s_purchase_order, ['id' => 'd_s_purchase_order']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">wf_batch</div>
                <div class = "col-xs-6">
                    {!! Form::text('wf_batch', $order->wf_batch, ['id' => 'wf_batch']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">order_status</div>
                <div class = "col-xs-6">
                    {!! Form::text('order_status', $order->order_status, ['id' => 'order_status']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">source</div>
                <div class = "col-xs-6">
                    {!! Form::text('source', $order->source, ['id' => 'source']) !!}
                </div>
            </div>
            <div class = "col-xs-12 apply-margin-top-bottom">
                <div class = "col-xs-3">cancel_code</div>
                <div class = "col-xs-6">
                    {!! Form::text('cancel_code', $order->cancel_code, ['id' => 'cancel_code']) !!}
                </div>
            </div>
        <div class = "col-xs-12 apply-margin-top-bottom">
            <div class = "col-xs-6">
                {!! Form::submit('Update') !!}
            </div>
        </div>

        {!! Form::close() !!}

        {!! Form::open(['url' => url(sprintf('/orders/%d', $order->id)), 'method' => 'delete', 'id' => 'delete-order-form']) !!}
        {!! Form::submit('Delete order', ['class'=> 'btn btn-danger', 'id' => 'delete-order-btn']) !!}
        {!! Form::close() !!}
    </div>
    <script type = "text/javascript" src = "//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script type = "text/javascript">
        var message = {
            delete: 'Are you sure you want to delete?',
        };
        $("input#delete-order-btn").on('click', function (event)
        {
            event.preventDefault();
            var action = confirm(message.delete);
            if ( action ) {
                var form = $("form#delete-order-form");
                form.submit();
            }
        });
    </script>
</body>
</html>