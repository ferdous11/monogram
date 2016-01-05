<!doctype html>
<html lang = "en">
<head>
    <meta charset = "UTF-8">
    <title>Stations</title>
    <link type = "text/css" rel = "stylesheet"
          href = "//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
</head>
<body>
    <div class = "container" style = "margin-top: 50px;">
        @if(count($stations) > 0)
            <table class = "table table-bordered">
                <tr>
                    <th>#</th>
                    <th>Station name</th>
                    <th>Station description</th>
                    <th>Action</th>
                </tr>
                @foreach($stations as $station)
                    <tr data-id="{{$station->id}}">
                        <td>{{ $count++ }}</td>
                        <td>{{ substr($station->station_name, 0, 30) }}</td>
                        <td>{{ $station->station_description }}</td>
                        <td>
                            <a href = "{{ url(sprintf("/stations/%d", $station->id)) }}" class = "btn btn-success">View</a>
                            | <a href = "{{ url(sprintf("/stations/%d/edit", $station->id)) }}" class = "btn btn-info">Edit</a>
                            | <a href = "#" class = "btn btn-danger delete">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </table>
            {!! Form::open(['url' => url('/stations/id'), 'method' => 'delete', 'id' => 'delete-station']) !!}
            {!! Form::close() !!}
            <div class = "col-xs-12 text-center">
                {!! $stations->render() !!}
            </div>
        @else
            <div class = "alert alert-warning">No station found</div>
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
                var form = $("form#delete-station");
                var url = form.attr('action');
                form.attr('action', url.replace('id', id));
                form.submit();
            }
        });
    </script>
</body>
</html>