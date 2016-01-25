<!doctype html>
<html lang = "en">
<head>
    <meta charset = "UTF-8">
    <title>Items list</title>
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
            <li><a href = "{{url('items')}}">Order items list</a></li>
        </ol>
        <div class = "col-xs-12">
            {!! Form::open(['method' => 'get', 'url' => url('items'), 'id' => 'search-order']) !!}
            <div class = "form-group col-xs-5">
                <label for = "search_for">Search for</label>
                {!! Form::text('search_for', null, ['id'=>'search_for', 'class' => 'form-control', 'placeholder' => 'Comma delimited']) !!}
            </div>
            <div class = "form-group col-xs-5">
                <label for = "search_in">Search in</label>
                {!! Form::select('search_in', $search_in, $request->get('search_in'), ['id'=>'search_in', 'class' => 'form-control']) !!}
            </div>
            <div class = "form-group col-xs-2">
                <label for = "" class = ""></label>
                {!! Form::submit('Search', ['id'=>'search', 'style' => 'margin-top: 2px;', 'class' => 'btn btn-primary form-control']) !!}
            </div>
            {!! Form::close() !!}
        </div>
        @if(count($items) > 0)
            <h3 class = "page-header">
                Items
                <span style = "font-size: 14px; padding-left: 10px;" class = "text-info text-center">{{$unassigned}} items are unassigned to batch.</span>
                <a class = "btn btn-success btn-sm" style="float: right;" href = "{{url('/items/batch')}}">Create batch preview</a>
            </h3>
            <table class = "table table-bordered">
                <tr>
                    <th>Order#</th>
                    <th>Store id</th>
                    <th>Customer</th>
                    <th>State</th>
                    <th>Description</th>
                    <th>ID</th>
                    <th>Option</th>
                    <th>Qty.</th>
                    <th>Batch</th>
                    <th>Station</th>
                </tr>
                @foreach($items as $item)
                    <tr data-id = "{{$item->id}}">
                        <td><a href = "{{ url("orders/details/".$item->order_id) }}"
                               class = "btn btn-link">{{$item->order->short_order}}</a></td>
                        <td>{{\App\Store::where('store_id', $item->order->store_id)->first()->store_name}}</td>
                        <td><a href = "{{ url("customers/".$item->order->customer->id) }}" title = "This is customer id"
                               class = "btn btn-link">{{ !empty($item->order->customer->ship_full_name) ? $item->order->customer->ship_full_name : $item->order->customer->bill_full_name }}</a>
                        </td>
                        <td>{{$item->order->customer->ship_state}}</td>
                        <td>{{$item->item_description}}</td>
                        <td>{{$item->item_id}}</td>
                        <td>{{\Monogram\Helper::jsonTransformer($item->item_option)}}</td>
                        <td>{{$item->item_quantity}}</td>
                        <td>{{$item->batch_number ?: 'N/A' }}</td>
                        {{--<td>{{$order->customer->ship_full_name}}</td>
                        <td>{{$order->customer->ship_state}}, {{$order->customer->ship_country}}</td>
                        <td>{{$order->item_count}}</td>
                        <td><i class="fa fa-usd"></i>{{$order->total}}</td>
                        <td>{{$order->order_date}}</td>
                        <td>{{$order->customer->shipping}}</td>--}}
                        <td>{{$item->station_name ? \App\Station::where('station_name', $item->station_name)->first()->station_description : 'N/A'}}</td>
                    </tr>
                @endforeach
            </table>
            <div class = "col-xs-12 text-center">
                {!! $items->appends($request->all())->render() !!}
            </div>
        @else
            <div class = "col-xs-12">
                <div class = "alert alert-warning text-center">
                    <h3>No item found.</h3>
                </div>
            </div>
        @endif
    </div>
    <script type = "text/javascript" src = "//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script type = "text/javascript" src = "//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</body>
</html>