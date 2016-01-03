<!doctype html>
<html lang = "en">
<head>
    <meta charset = "UTF-8">
    <title>Users</title>
    <link type = "text/css" rel = "stylesheet"
          href = "//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
</head>
<body>
    <div class = "container" style = "margin-top: 50px;">
        @if(count($users) > 0)
            <table class = "table table-bordered">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Location</th>
                    <th>Action</th>
                </tr>
                @foreach($users as $user)
                    <tr data-id="{{$user->id}}">
                        <td>{{ $count++ }}</td>
                        <td>{{ substr($user->username, 0, 30) }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->state }} ( Foreign key for Location )</td>
                        <td>
                            <a href = "{{ url(sprintf("/users/%d", $user->id)) }}" class = "btn btn-success">View</a>
                            | <a href = "{{ url(sprintf("/users/%d/edit", $user->id)) }}" class = "btn btn-info">Edit</a>
                            | <a href = "#" class = "btn btn-danger delete">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </table>
            {!! Form::open(['url' => url('/users/id'), 'method' => 'delete', 'id' => 'delete-user']) !!}
            {!! Form::close() !!}
            <div class = "col-xs-12 text-center">
                {!! $users->render() !!}
            </div>
        @else
            <div class = "alert alert-warning">No user found</div>
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
                var form = $("form#delete-user");
                var url = form.attr('action');
                form.attr('action', url.replace('id', id));
                form.submit();
            }
        });
    </script>
</body>
</html>