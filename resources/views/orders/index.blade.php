<!doctype html>
<html lang = "en">
<head>
    <meta charset = "UTF-8">
    <title>Orders</title>
    <link type = "text/css" rel = "stylesheet"
          href = "//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
</head>
<body>
    <div class = "container" style = "margin-top: 50px;">
        @if(count($orders) > 0)
            <table class = "table table-bordered">
                <tr>
                    <th>#</th>
                    <th>Email</th>
                    <th>Market</th>
                    <th>Paid</th>
                    <th>Action</th>
                </tr>
                @foreach($orders as $order)
                    <tr data-id="{{$order->id}}">
                        <td>{{ $count++ }}</td>
                        <td>{{ $order->email }}</td>
                        <td>{{ $order->market }}</td>
                        <td>{{ $order->paid }}</td>
                        <td>
                            <a href = "{{ url(sprintf("/orders/%d", $order->id)) }}" class = "btn btn-success">View</a>
                            | <a href = "{{ url(sprintf("/orders/%d/edit", $order->id)) }}" class = "btn btn-info">Edit</a>
                            | <a href = "#" class = "btn btn-danger delete">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </table>
            {!! Form::open(['url' => url('/orders/id'), 'method' => 'delete', 'id' => 'delete-order']) !!}
            {!! Form::close() !!}
            <div class = "col-xs-12 text-center">
                {!! $orders->render() !!}
            </div>
        @else
            <div class = "alert alert-warning">No order found</div>
        @endif
    </div>
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script type="text/javascript">
        var message = {
            delete: 'Are you sure you want to delete?',
        };
        $("a.delete").on('click', function (event){
            event.preventDefault();
            var id = $(this).closest('tr').attr('data-id');
            var action = confirm(message.delete);
            if(action){
                var form = $("form#delete-order");
                var url = form.attr('action');
                form.attr('action', url.replace('id', id));
                form.submit();
            }
        });
    </script>
</body>
</html>