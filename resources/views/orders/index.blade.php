<!doctype html>
<html lang = "en">
<head>
    <meta charset = "UTF-8">
    <title>Orders</title>
    <link type = "text/css" rel = "stylesheet"
          href = "//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <link type = "text/css" rel = "stylesheet"
          href = "//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>
<body>
    @include('includes.header_menu')
    <div class = "container">
        @if(count($orders) > 0)
            <h3 class = "page-header">Orders</h3>
            <table class = "table table-bordered">
                <tr>
                    <th>#</th>
                    <th>Email</th>
                    <th>Market</th>
                    <th>Paid</th>
                    <th>Action</th>
                </tr>
                @foreach($orders as $order)
                    <tr data-id = "{{$order->id}}">
                        <td>{{ $count++ }}</td>
                        <td>{{ $order->email }}</td>
                        <td>{{ $order->market }}</td>
                        <td>{{ $order->paid }}</td>
                        <td>
                            <a href = "{{ url(sprintf("/orders/%d", $order->id)) }}" data-toggle = "tooltip"
                               data-placement = "top"
                               title = "View this order"><i class = 'fa fa-eye text-primary'></i></a>
                            | <a href = "{{ url(sprintf("/orders/%d/edit", $order->id)) }}" data-toggle = "tooltip"
                                 data-placement = "top"
                                 title = "Edit this order"><i class = 'fa fa-pencil-square-o text-success'></i></a>
                            | <a href = "#" class = "delete" data-toggle = "tooltip" data-placement = "top"
                                 title = "Delete this product"><i class = 'fa fa-times text-danger'></i></a>
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
            <div class = "col-xs-12">
                <div class = "alert alert-warning text-center">
                    <h3>No order found.</h3>
                </div>
            </div>
        @endif
    </div>
    <script type = "text/javascript" src = "//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script type = "text/javascript" src = "//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script type = "text/javascript">
        $(function ()
        {
            $('[data-toggle="tooltip"]').tooltip();
        });
        var message = {
            delete: 'Are you sure you want to delete?',
        };
        $("a.delete").on('click', function (event)
        {
            event.preventDefault();
            var id = $(this).closest('tr').attr('data-id');
            var action = confirm(message.delete);
            if ( action ) {
                var form = $("form#delete-order");
                var url = form.attr('action');
                form.attr('action', url.replace('id', id));
                form.submit();
            }
        });
    </script>
</body>
</html>