<!doctype html>
<html lang = "en">
<head>
    <meta charset = "UTF-8">
    <title>Products</title>
    <link type = "text/css" rel = "stylesheet"
          href = "//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <link type = "text/css" rel = "stylesheet"
          href = "//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>
<body>
    @include('includes.header_menu')
    <div class = "container">
        @if(count($products) > 0)
            <h3 class="page-header">Products</h3>
            <table class = "table table-bordered">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Model</th>
                    <th>Condition</th>
                    <th>Action</th>
                </tr>
                @foreach($products as $product)
                    <tr data-id="{{$product->id}}">
                        <td>{{ $count++ }}</td>
                        <td>{{ $product->product_name }}</td>
                        <td>{{ $product->model }}</td>
                        <td>{{ $product->product_condition }}</td>
                        <td>
                            <a href = "{{ url(sprintf("/products/%d", $product->id)) }}" data-toggle = "tooltip"
                               data-placement = "top"
                               title = "View this product"><i class = 'fa fa-eye text-primary'></i></a>
                            | <a href = "{{ url(sprintf("/products/%d/edit", $product->id)) }}" data-toggle = "tooltip"
                                 data-placement = "top"
                                 title = "Edit this product"><i class = 'fa fa-pencil-square-o text-success'></i></a>
                            | <a href = "#" class = "delete" data-toggle = "tooltip" data-placement = "top"
                                 title = "Delete this product"><i class = 'fa fa-times text-danger'></i></a>
                        </td>
                    </tr>
                @endforeach
            </table>
            {!! Form::open(['url' => url('/products/id'), 'method' => 'delete', 'id' => 'delete-product']) !!}
            {!! Form::close() !!}
            <div class = "col-xs-12 text-center">
                {!! $products->render() !!}
            </div>
        @else
            <div class = "alert alert-warning">No product found</div>
        @endif
    </div>
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script type = "text/javascript" src = "//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(function ()
        {
            $('[data-toggle="tooltip"]').tooltip();
        });
        var message = {
            delete: 'Are you sure you want to delete?',
        };
        $("a.delete").on('click', function (event){
            event.preventDefault();
            var id = $(this).closest('tr').attr('data-id');
            var action = confirm(message.delete);
            if(action){
                var form = $("form#delete-product");
                var url = form.attr('action');
                form.attr('action', url.replace('id', id));
                form.submit();
            }
        });
    </script>
</body>
</html>