<!doctype html>
<html lang = "en">
<head>
    <meta charset = "UTF-8">
    <title>Products</title>
    <link type = "text/css" rel = "stylesheet"
          href = "//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
</head>
<body>
    <div class = "container" style = "margin-top: 50px;">
        @if(count($products) > 0)
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
                        <td>{{ $product->condition }}</td>
                        <td>
                            <a href = "{{ url(sprintf("/products/%d", $product->id)) }}" class = "btn btn-success">View</a>
                            | <a href = "{{ url(sprintf("/products/%d/edit", $product->id)) }}" class = "btn btn-info">Edit</a>
                            | <a href = "#" class = "btn btn-danger delete">Delete</a>
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
    <script type="text/javascript">
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