<!doctype html>
<html lang = "en">
<head>
    <meta charset = "UTF-8">
    <title>Customers</title>
    <link type = "text/css" rel = "stylesheet"
          href = "//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
</head>
<body>
    <div class = "container" style = "margin-top: 50px;">
        @if(count($customers) > 0)
            <table class = "table table-bordered">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Location</th>
                    <th>Action</th>
                </tr>
                @foreach($customers as $customer)
                    <tr>
                        <td>{{ $count++ }}</td>
                        <td>{{ substr($customer->ship_full_name, 0, 30) }}</td>
                        <td>{{ sprintf("%s, %s, %s, %s, %s - %s", $customer->shipping_address_1, $customer->shipping_address_2, $customer->ship_city, $customer->ship_state, $customer->ship_country, $customer->ship_zip) }}</td>
                        <td>
                            <a href = "{{ url(sprintf("/customers/%d", $customer->id)) }}">View</a>
                            <a href = "{{ url(sprintf("/customers/%d/edit", $customer->id)) }}">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </table>
            <div class="col-xs-12 text-center">
                {!! $customers->render() !!}
            </div>
        @else
            <div class = "alert alert-warning">No customer is registered</div>
        @endif
    </div>
</body>
</html>