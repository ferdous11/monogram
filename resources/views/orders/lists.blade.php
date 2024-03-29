<!doctype html>
<html lang = "en">
<head>
    <meta charset = "UTF-8">
    <title>Orders list</title>
    <meta name = "viewport" content = "width=device-width, initial-scale=1">
    <link type = "text/css" rel = "stylesheet"
          href = "//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <link type = "text/css" rel = "stylesheet"
          href = "//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>
<body>
    @include('includes.header_menu')
    <div class = "container">
        <ol class = "breadcrumb">
            <li><a href = "{{url('/')}}">Home</a></li>
            <li><a href="{{url('orders/list')}}">Orders</a></li>
            {{--@if($request->has('status'))
                <li><a href="{{url('orders/list')}}">Orders</a></li>
                <li class="active">Search</li>
            @else
                <li class = "active">Orders</li>
            @endif--}}
        </ol>
        <div class = "col-xs-12">
            {{--{!! Form::open(['method' => 'get', 'url' => url('orders/search'), 'id' => 'search-order']) !!}--}}
            {!! Form::open(['method' => 'get', 'url' => url('orders/list'), 'id' => 'search-order']) !!}
            <div class = "form-group col-xs-2">
                <label for = "store">Market/Store</label>
                {!! Form::select('store', $stores, $request->get('store'), ['id'=>'store', 'class' => 'form-control']) !!}
            </div>
            <div class = "form-group col-xs-2">
                <label for = "status">Status</label>
                {!! Form::select('status', $statuses, $request->get('status'), ['id'=>'status', 'class' => 'form-control']) !!}
            </div>
            <div class = "form-group col-xs-2">
                <label for = "shipping_method">Shipping method</label>
                {!! Form::select('shipping_method', $shipping_methods, $request->get('shipping_method'), ['id'=>'shipping_method', 'class' => 'form-control']) !!}
            </div>
            <div class = "form-group col-xs-2">
                <label for = "search_for">Search for</label>
                {!! Form::text('search_for', null, ['id'=>'search_for', 'class' => 'form-control', 'placeholder' => 'Comma delimited']) !!}
            </div>
            <div class = "form-group col-xs-2">
                <label for = "search_in">Search in</label>
                {!! Form::select('search_in', $search_in, $request->get('search_in'), ['id'=>'search_in', 'class' => 'form-control']) !!}
            </div>
            <div class = "form-group col-xs-2">
                <label for="" class=""></label>
                {!! Form::submit('Search', ['id'=>'search', 'style' => 'margin-top: 2px;', 'class' => 'btn btn-primary form-control']) !!}
            </div>
            {!! Form::close() !!}
        </div>
        @if(count($orders) > 0)
            <h3 class = "page-header">
                Orders
                <a class = "btn btn-success btn-sm pull-right" href = "{{url('/orders/create')}}">Create order</a>
            </h3>
            <table class = "table table-bordered">
                <tr>
                    <th>Order#</th>
                    <th>Customer#</th>
                    <th>Name</th>
                    <th>State/Country</th>
                    <th>Item</th>
                    <th>Order total</th>
                    <th>Order date</th>
                    <th>Ship method</th>
                    <th>Status</th>
                </tr>
                @foreach($orders as $order)
                    <tr data-id = "{{$order->id}}">
                        <td><a href="{{ url("orders/details/".$order->order_id) }}" class="btn btn-link">{{$order->short_order}}</a></td>
                        <td><a href="{{ url("customers/".$order->customer->id) }}" title="This is customer id" class="btn btn-link">{{$order->customer->id}}</a></td>
                        <td>{{$order->customer->ship_full_name}}</td>
                        <td>{{$order->customer->ship_state}}, {{$order->customer->ship_country}}</td>
                        <td>{{$order->item_count}}</td>
                        <td><i class="fa fa-usd"></i>{{$order->total}}</td>
                        <td>{{$order->order_date}}</td>
                        <td>{{$order->customer->shipping}}</td>
                        <td>{!! Form::select('status', $statuses, App\Status::find($order->order_status)->status_code) !!}</td>
                    </tr>
                @endforeach
            </table>
            <div class = "col-xs-12 text-center">
                {!! $orders->appends($request->all())->render() !!}
            </div>
        @else
            <div class = "col-xs-12">
                <div class = "alert alert-warning text-center">
                    <h3>No order found.</h3>
                </div>
            </div>
        @endif
    </div>
    <script type = "text/javascript" src = "//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script type = "text/javascript" src = "//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</body>
</html>