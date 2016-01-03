<!doctype html>
<html lang = "en">
<head>
    <meta charset = "UTF-8">
    <title>User - {{$user->username}}</title>
    <link type = "text/css" rel = "stylesheet"
          href = "//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
</head>
<body>
    <div class = "container" style = "margin-top: 50px;">
        <a href = "{{ url(sprintf("/users/%d/edit", $user->id)) }}" class="btn btn-success">Edit this user</a>
        <table class = "table table-bordered">
            <caption>User details</caption>
            <tr>
                <td>Username</td>
                <td>{{$user->username}}</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>{{$user->email}}</td>
            </tr>
            <tr>
                <td>vendor_id</td>
                <td>{{$user->vendor_id}}</td>
            </tr>
            <tr>
                <td>zip_code</td>
                <td>{{$user->zip_code}}</td>
            </tr>
            <tr>
                <td>state</td>
                <td>{{$user->state}}</td>
            </tr>
        </table>
        {!! Form::open(['url' => url(sprintf('/users/%d', $user->id)), 'method' => 'delete', 'id' => 'delete-user-form']) !!}
        {!! Form::submit('Delete user', ['class'=> 'btn btn-danger', 'id' => 'delete-user-btn']) !!}
        {!! Form::close() !!}
    </div>
    <script type = "text/javascript" src = "//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script type = "text/javascript">
        var message = {
            delete: 'Are you sure you want to delete?',
        };
        $("input#delete-user-btn").on('click', function (event)
        {
            event.preventDefault();
            var action = confirm(message.delete);
            if ( action ) {
                var form = $("form#delete-user-form");
                form.submit();
            }
        });
    </script>
</body>
</html>