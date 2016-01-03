<!doctype html>
<html lang = "en">
<head>
    <meta charset = "UTF-8">
    <title>Edit User - {{$user->username}}</title>
    <link type = "text/css" rel = "stylesheet"
          href = "//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <style>
        div.apply-margin-top-bottom {
            margin: 5px;
        }
    </style>
</head>
<body>
    <div class = "container apply-margin-top-bottom">
        @if($errors->any())
            <div class = "col-xs-12">
                <div class = "alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        {!! Form::open(['url' => url(sprintf("/users/%d", $user->id)), 'method' => 'put']) !!}
        <div class = "col-xs-12 apply-margin-top-bottom">
            <div class = "col-xs-3">username</div>
            <div class = "col-xs-6">
                {!! Form::text('username', $user->username, ['id' => 'username']) !!}
            </div>
        </div>
        <div class = "col-xs-12 apply-margin-top-bottom">
            <div class = "col-xs-3">email</div>
            <div class = "col-xs-6">
                {!! Form::email('email', null, ['id' => 'email', 'placeholder' => 'Insertion will update the email']) !!}
            </div>
        </div>
        <div class = "col-xs-12 apply-margin-top-bottom">
            <div class = "col-xs-3">password</div>
            <div class = "col-xs-6">
                {!! Form::password('password', ['id' => 'password', 'placeholder' => 'Insertion will set new password']) !!}
            </div>
        </div>
        <div class = "col-xs-12 apply-margin-top-bottom">
            <div class = "col-xs-3">role</div>
            <div class = "col-xs-6">
                {!! Form::select('role', $roles, $given_role, ['id' => 'role']) !!}
            </div>
        </div>
        <div class = "col-xs-12 apply-margin-top-bottom">
            <div class = "col-xs-3">vendor_id(TODO: SELECT TYPE)</div>
            <div class = "col-xs-6">
                {!! Form::text('vendor_id', $user->vendor_id, ['id' => 'vendor_id']) !!}
            </div>
        </div>
        <div class = "col-xs-12 apply-margin-top-bottom">
            <div class = "col-xs-3">zip_code</div>
            <div class = "col-xs-6">
                {!! Form::text('zip_code', $user->zip_code, ['id' => 'zip_code']) !!}
            </div>
        </div>
        <div class = "col-xs-12 apply-margin-top-bottom">
            <div class = "col-xs-3">state(TODO: SELECT TYPE)</div>
            <div class = "col-xs-6">
                {!! Form::text('state', $user->state, ['id' => 'state']) !!}
            </div>
        </div>
        <div class = "col-xs-12 apply-margin-top-bottom">
            <div class = "col-xs-6">
                {!! Form::submit('Update') !!}
            </div>
        </div>

        {!! Form::close() !!}

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