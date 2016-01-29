<!doctype html>
<html lang = "en">
<head>
    <meta charset = "UTF-8">
    <title>Sub categories</title>
    <meta name = "viewport" content = "width=device-width, initial-scale=1">
    <link type = "text/css" rel = "stylesheet"
          href = "//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <link type = "text/css" rel = "stylesheet"
          href = "//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>
<body>
    @include('includes.header_menu')
    <div class = "container">
        <ol class="breadcrumb">
            <li><a href="{{url('/')}}">Home</a></li>
            <li class="active">Sub categories</li>
        </ol>
        <div class = "col-xs-12 text-right" style = "margin: 10px 0;">
            <button class = "btn btn-success" type = "button" data-toggle = "collapse" data-target = "#collapsible-top"
                    aria-expanded = "false" aria-controls = "collapsible">Create new SubCategory
            </button>
            <div class = "collapse text-left" id = "collapsible-top">
                {!! Form::open(['url' => url('/sub_categories'), 'method' => 'post']) !!}
                <div class = "form-group col-xs-12">
                    {!! Form::label('sub_category_code', 'Subcategory code', ['class' => 'col-xs-2 control-label']) !!}
                    <div class = "col-sm-4">
                        {!! Form::text('sub_category_code', null, ['id' => 'sub_category_code', 'class' => "form-control", 'placeholder' => "Enter Subcategory code"]) !!}
                    </div>
                </div>
                <div class = "form-group col-xs-12">
                    {!! Form::label('sub_category_description', 'Description', ['class' => 'col-xs-2 control-label']) !!}
                    <div class = "col-sm-4">
                        {!! Form::text('sub_category_description', null, ['id' => 'sub_category_description', 'class' => "form-control", 'placeholder' => "Enter Subcategory description"]) !!}
                    </div>
                </div>
                <div class = "form-group col-xs-12">
                    {!! Form::label('sub_category_display_order', 'Display order', ['class' => 'col-xs-2 control-label']) !!}
                    <div class = "col-sm-4">
                        {!! Form::text('sub_category_display_order', null, ['id' => 'sub_category_display_order', 'class' => "form-control", 'placeholder' => "Enter Subcategory display order"]) !!}
                    </div>
                </div>
                <div class = "col-xs-12 apply-margin-top-bottom">
                    <div class = "col-xs-offset-2 col-xs-4">
                        {!! Form::submit('Create sub category', ['class' => 'btn btn-primary btn-block']) !!}
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
        @if(count($sub_categories) > 0)
            <div class = "col-xs-12">
                <table class = "table table-bordered">
                    <tr>
                        <th style="text-align:center">#</th>
                        <th>subcategory_code</th>
                        <th>subcategory_description</th>
                        <th>subcategory_display_order</th>
                        <th>Action</th>
                    </tr>
                    @foreach($sub_categories as $sub_category)
                        <tr data-id = "{{$sub_category->id}}">
                            <td> <a href = "#" class = "delete" data-toggle = "tooltip" data-placement = "top"
                                     title = "Delete this item"><i class = "fa fa-times text-danger"></i> </a>{{ $count++ }}</td>
                            <td>{!! Form::text('sub_category_code', $sub_category->sub_category_code, ['class' => 'form-control']) !!}</td>
                            <td>{!! Form::text('sub_category_description', $sub_category->sub_category_description, ['class' => 'form-control']) !!}</td>
                            <td>{!! Form::text('sub_category_display_order', $sub_category->sub_category_display_order, ['class' => 'form-control']) !!}</td>
                            <td>
                                {{--<a href = "{{ url(sprintf("/subcategories/%d", $subcategory->id)) }}" class = "btn btn-success">View</a> | --}}
                                <a href = "#" class = "update" data-toggle = "tooltip" data-placement = "top"
                                   title = "Edit this item"><i class = "fa fa-pencil-square-o text-success"></i> </a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
            <div class="col-xs-12 text-center">
                {!! $sub_categories->render() !!}
            </div>
            {!! Form::open(['url' => url('/sub_categories/id'), 'method' => 'delete', 'id' => 'delete-sub-category']) !!}
            {!! Form::close() !!}

            {!! Form::open(['url' => url('/sub_categories/id'), 'method' => 'put', 'id' => 'update-sub-category']) !!}
            {!! Form::hidden('sub_category_code', null, ['id' => 'update_subcategory_code']) !!}
            {!! Form::hidden('sub_category_description', null, ['id' => 'update_subcategory_description']) !!}
            {!! Form::hidden('sub_category_display_order', null, ['id' => 'update_subcategory_display_order']) !!}
            {!! Form::close() !!}
        @else
            <div class = "col-xs-12">
                <div class = "alert alert-warning text-center">
                    <h3>No Subcategory found.</h3>
                </div>
            </div>
        @endif
        <div class = "col-xs-12 text-right" style = "margin: 10px 0;">
            <button class = "btn btn-success" type = "button" data-toggle = "collapse"
                    data-target = "#collapsible-bottom"
                    aria-expanded = "false" aria-controls = "collapsible">Create new subcategory
            </button>
            <div class = "collapse text-left" id = "collapsible-bottom">
                {!! Form::open(['url' => url('/sub_categories'), 'method' => 'post']) !!}
                <div class = "form-group col-xs-12">
                    {!! Form::label('sub_category_code', 'Subcategory code', ['class' => 'col-xs-2 control-label']) !!}
                    <div class = "col-sm-4">
                        {!! Form::text('sub_category_code', null, ['id' => 'sub_category_code', 'class' => "form-control", 'placeholder' => "Enter Subcategory code"]) !!}
                    </div>
                </div>
                <div class = "form-group col-xs-12">
                    {!! Form::label('sub_category_description', 'Description', ['class' => 'col-xs-2 control-label']) !!}
                    <div class = "col-sm-4">
                        {!! Form::text('sub_category_description', null, ['id' => 'sub_category_description', 'class' => "form-control", 'placeholder' => "Enter Subcategory description"]) !!}
                    </div>
                </div>
                <div class = "form-group col-xs-12">
                    {!! Form::label('sub_category_display_order', 'Display order', ['class' => 'col-xs-2 control-label']) !!}
                    <div class = "col-sm-4">
                        {!! Form::text('sub_category_display_order', null, ['id' => 'sub_category_display_order', 'class' => "form-control", 'placeholder' => "Enter Subcategory display order"]) !!}
                    </div>
                </div>
                <div class = "col-xs-12 apply-margin-top-bottom">
                    <div class = "col-xs-offset-2 col-xs-4">
                        {!! Form::submit('Create subcategory', ['class' => 'btn btn-primary btn-block']) !!}
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
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
                var form = $("form#delete-sub-category");
                var url = form.attr('action');
                form.attr('action', url.replace('id', id));
                form.submit();
            }
        });

        $("a.update").on('click', function (event)
        {
            event.preventDefault();
            var tr = $(this).closest('tr');
            var id = tr.attr('data-id');

            var code = tr.find('input').eq(0).val();
            var description = tr.find('input').eq(1).val();
            var order = tr.find('input').eq(2).val();

            $("input#update_subcategory_code").val(code);
            $("input#update_subcategory_description").val(description);
            $("input#update_subcategory_display_order").val(order);
            var form = $("form#update-sub-category");
            var url = form.attr('action');
            form.attr('action', url.replace('id', id));
            form.submit();
        });
    </script>
</body>
</html>