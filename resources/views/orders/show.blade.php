<!doctype html>
<html lang = "en">
<head>
    <meta charset = "UTF-8">
    <title>Order by - {{$order->email}}</title>
    <link type = "text/css" rel = "stylesheet"
          href = "//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
</head>
<body>
    <div class = "container" style = "margin-top: 50px;">
        <a href = "{{ url(sprintf("/orders/%d/edit", $order->id)) }}" class="btn btn-success">Edit this order</a>
        <table class = "table table-bordered">
            <caption>Order details</caption>
            <tr>
                <td>order_id</td>
                <td>{{$order->order_id}}</td>
            </tr>
            <tr>
                <td>email</td>
                <td>{{$order->email}}</td>
            </tr>
            <tr>
                <td>customer_id</td>
                <td>{{$order->customer_id}}</td>
            </tr>
            <tr>
                <td>placed_by</td>
                <td>{{$order->placed_by}}</td>
            </tr>
            <tr>
                <td>store_id</td>
                <td>{{$order->store_id}}</td>
            </tr>
            <tr>
                <td>market</td>
                <td>{{$order->market}}</td>
            </tr>
            <tr>
                <td>order_date</td>
                <td>{{$order->order_date}}</td>
            </tr>
            <tr>
                <td>paid</td>
                <td>{{$order->paid}}</td>
            </tr>
            <tr>
                <td>payment_method</td>
                <td>{{$order->payment_method}}</td>
            </tr>
            <tr>
                <td>sub_total</td>
                <td>{{$order->sub_total}}</td>
            </tr>
            <tr>
                <td>shipping_cost</td>
                <td>{{$order->shipping_cost}}</td>
            </tr>
            <tr>
                <td>discount</td>
                <td>{{$order->discount}}</td>
            </tr>
            <tr>
                <td>gift_wrap_cost</td>
                <td>{{$order->gift_wrap_cost}}</td>
            </tr>
            <tr>
                <td>tax</td>
                <td>{{$order->tax}}</td>
            </tr>
            <tr>
                <td>adjustment</td>
                <td>{{$order->adjustment}}</td>
            </tr>
            <tr>
                <td>order_total</td>
                <td>{{$order->order_total}}</td>
            </tr>
            <tr>
                <td>fraud_score</td>
                <td>{{$order->fraud_score}}</td>
            </tr>
            <tr>
                <td>coupon_name</td>
                <td>{{$order->coupon_name}}</td>
            </tr>
            <tr>
                <td>shipping_method</td>
                <td>{{$order->shipping_method}}</td>
            </tr>
            <tr>
                <td>four_pl_unique_id</td>
                <td>{{$order->four_pl_unique_id}}</td>
            </tr>
            <tr>
                <td>short_order</td>
                <td>{{$order->short_order}}</td>
            </tr>
            <tr>
                <td>order_comments</td>
                <td>{{$order->order_comments}}</td>
            </tr>
            <tr>
                <td>item_name</td>
                <td>{{$order->item_name}}</td>
            </tr>
            <tr>
                <td>item_code</td>
                <td>{{$order->item_code}}</td>
            </tr>
            <tr>
                <td>item_id</td>
                <td>{{$order->item_id}}</td>
            </tr>
            <tr>
                <td>item_qty</td>
                <td>{{$order->item_qty}}</td>
            </tr>
            <tr>
                <td>item_price</td>
                <td>{{$order->item_price}}</td>
            </tr>
            <tr>
                <td>item_cost</td>
                <td>{{$order->item_cost}}</td>
            </tr>
            <tr>
                <td>item_options</td>
                <td>{{$order->item_options}}</td>
            </tr>
            <tr>
                <td>trk</td>
                <td>{{$order->trk}}</td>
            </tr>
            <tr>
                <td>ship_date</td>
                <td>{{$order->ship_date}}</td>
            </tr>
            <tr>
                <td>shipping_carrier</td>
                <td>{{$order->shipping_carrier}}</td>
            </tr>
            <tr>
                <td>drop_shipper</td>
                <td>{{$order->drop_shipper}}</td>
            </tr>
            <tr>
                <td>return_request_code</td>
                <td>{{$order->return_request_code}}</td>
            </tr>
            <tr>
                <td>return_request_date</td>
                <td>{{$order->return_request_date}}</td>
            </tr>
            <tr>
                <td>return_disposition_code</td>
                <td>{{$order->return_disposition_code}}</td>
            </tr>
            <tr>
                <td>return_date</td>
                <td>{{$order->return_date}}</td>
            </tr>
            <tr>
                <td>rma</td>
                <td>{{$order->rma}}</td>
            </tr>
            <tr>
                <td>d_s_purchase_order</td>
                <td>{{$order->d_s_purchase_order}}</td>
            </tr>
            <tr>
                <td>wf_batch</td>
                <td>{{$order->wf_batch}}</td>
            </tr>
            <tr>
                <td>order_status</td>
                <td>{{$order->order_status}}</td>
            </tr>
            <tr>
                <td>source</td>
                <td>{{$order->source}}</td>
            </tr>
            <tr>
                <td>storeId</td>
                <td>{{$order->cancel_code}}</td>
            </tr>
        </table>
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