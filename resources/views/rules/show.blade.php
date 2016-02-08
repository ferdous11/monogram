<!doctype html>
<html lang = "en">
<head>
	<meta charset = "UTF-8">
	<title>Update rule</title>
	<meta name = "viewport" content = "width=device-width, initial-scale=1">
	<link type = "text/css" rel = "stylesheet"
	      href = "//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<link type = "text/css" rel = "stylesheet"
	      href = "//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<style>

	</style>
</head>
<body>
	@include('includes.header_menu')
	<div class = "container">
		<ol class = "breadcrumb">
			<li><a href = "{{url('/')}}">Home</a></li>
			<li><a href = "{{url('/rules')}}">Rules</a></li>
			<li class = "active">Update => {{$rule->rule_name}}</li>
		</ol>
		@include('includes.error_div')
		@include('includes.success_div')
		{!! Form::open(['url' => url(sprintf("rules/bulk_update/%d", $rule->id)), 'id' => 'rule-update', 'method' => 'put', 'class' => 'form-horizontal' ]) !!}
		{{-- Shipping rule triggers --}}
		<div class = "col-xs-12">
			<table class = "table" id = "rule-trigger-table">
				<caption><h4>Shipping rule triggers</h4></caption>
				<thead>
				<tr>
					<th>Remove</th>
					<th>Parameter</th>
					<th>Relation</th>
					<th>Value</th>
				</tr>
				</thead>
				<tbody id = "rule-trigger-table-rows">
				@if(count($rule->triggers))
					@foreach($rule->triggers as $trigger)
						<tr>
							<td>
								<span class = "text-danger delete-row" data-toggle = "tooltip" data-placement = "top"
								      title = "Delete trigger"><i class = "fa fa-times"></i> </span>
							</td>
							<td>{!! Form::select('trigger_type[]', $trigger_parameters, $trigger->rule_trigger_parameter, ['class' => 'form-control']) !!}</td>
							<td>{!! Form::select('trigger_relation[]', $trigger_relations, $trigger->rule_trigger_relation, ['class' => 'form-control']) !!}</td>
							<td>{!! Form::text('trigger_value[]', $trigger->rule_trigger_value, ['class' => 'form-control']) !!}</td>
						</tr>
					@endforeach
				@endif
				</tbody>
			</table>
		</div>
		<div class = "col-xs-12">
			<div class = "form-group pull-right">
				{!! Form::button('Add trigger row', ['id' => 'add-new-row-to-trigger-table', 'class' => 'btn btn-info']) !!}
			</div>
		</div>
		{{-- Shipping rule actions --}}
		<div class = "col-xs-12">
			<table class = "table" id = "rule-action-table">
				<caption><h4>Shipping rule actions</h4></caption>
				<thead>
				<tr>
					<th>Remove</th>
					<th>Parameter</th>
					<th>Value</th>
				</tr>
				</thead>
				<tbody id = "rule-action-table-rows">
				@if(count($rule->actions))
					@foreach($rule->actions as $action)
						<tr>
							<td>
								<span class = "text-danger delete-row" data-toggle = "tooltip" data-placement = "top"
								      title = "Delete action"><i class = "fa fa-times"></i> </span>
							</td>
							<td>{!! Form::select('action_type[]', $action_parameters, $action->rule_action_parameter, ['class' => 'form-control']) !!}</td>
							<td>{!! Form::text('action_value[]', $action->rule_action_value, ['class' => 'form-control']) !!}</td>
						</tr>
					@endforeach
				@endif
				</tbody>
			</table>
		</div>
		<div class = "col-xs-12">
			<div class = "form-group pull-right">
				{!! Form::button('Add action row', ['id' => 'add-new-row-to-action-table', 'class' => 'btn btn-info']) !!}
			</div>
		</div>

		<div class = "col-xs-12">
			<div class = "form-group pull-right">
				{!! Form::submit('Update', ['id' => 'update', 'class' => 'btn btn-success']) !!}
			</div>
		</div>
		{!! Form::close() !!}
	</div>
	<script type = "text/javascript" src = "//code.jquery.com/jquery-1.11.3.min.js"></script>
	<script type = "text/javascript" src = "//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<script type = "text/javascript">
		var message = {
			delete: 'Are you sure you want to delete?',
		};

		$(function ()
		{
			$("body").tooltip({selector: '[data-toggle="tooltip"]'});
		});

		$("body").on('click', "span.delete-row", function (event)
		{
			event.preventDefault();
			var answer = confirm(message.delete);
			if ( answer ) {
				$(this).closest('tr').remove();
			}
		});

		function get_trigger_row ()
		{
			var row = '<tr>\
							<td>\
								<span class="text-danger delete-row" data-toggle="tooltip" data-placement="top" title="Delete trigger"><i class="fa fa-times"></i> </span>\
							</td>\
						<td>\
							<select class="form-control" name="trigger_type[]">\
								<option value="">Select Parameter</option>\
								<option value="VAL">Items Value ($)</option>\
								<option value="OT">Order total ($)</option>\
								<option value="NUM">Number of items</option>\
								<option value="DOM">Domestic/International</option>\
								<option value="WGT">Weight (Lbs.)</option>\
								<option value="SHIP">Selected shipping method by customer</option>\
								<option value="STAT">Ship to state list</option>\
								<option value="SKU">SKUs list</option>\
								<option value="MKT">Store</option>\
							</select>\
						</td>\
						<td>\
							<select class="form-control" name="trigger_relation[]">\
								<option value="<">&lt;</option>\
								<option value="<=">&lt;=</option>\
								<option value="=">=</option>\
								<option value=">">&gt;</option>\
								<option value=">=">&gt;=</option>\
								<option value="IN">IN</option>\
							</select>\
						</td>\
						<td>\
							<input class="form-control" name="trigger_value[]" type="text" >\
						</td>\
						</tr>';
			return row;
		}

		function add_new_trigger_row (place)
		{
			$(place).append($(get_trigger_row()));
		}

		$("button#add-new-row-to-trigger-table").on('click', function (event)
		{

			var tbody = $('table#rule-trigger-table tbody#rule-trigger-table-rows');
			add_new_trigger_row(tbody);
		});


		function get_action_row ()
		{
			var row = '<tr>\
							<td>\
								<span class="text-danger delete-row" data-toggle="tooltip" data-placement="top" title="Delete action"><i class="fa fa-times"></i> </span>\
							</td>\
							<td>\
								<select class="form-control" name="action_type[]">\
									<option value="">Select Parameter</option>\
									<option value="CAR">Carrier</option>\
									<option value="CLS">Shipping class</option>\
									<option value="INS">Insurance</option>\
									<option value="PKG">Package shape</option>\
									<option value="SIG">Signature Confirmation</option>\
									<option value="ADW">Add weight (Oz)</option>\
								</select>\
							</td>\
							<td>\
								<input class="form-control" name="action_value[]" type="text">\
							</td>\
					</tr>';
			return row;
		}

		function add_new_action_row (place)
		{
			$(place).append($(get_action_row()));
		}

		$("button#add-new-row-to-action-table").on('click', function (event)
		{

			var tbody = $('table#rule-action-table tbody#rule-action-table-rows');
			add_new_action_row(tbody);
		});


	</script>
	{{--<script type = "text/javascript">
		var message = {
			delete: 'Are you sure you want to delete?',
		};


		$(function ()
		{
			$("body").tooltip({selector: '[data-toggle="tooltip"]'});
			table_row_repositioning_method();
		});
		$("body").on('mousedown', 'table#draggable-table tbody', function (event)
		{
			$('html,body').css('cursor', 'move');
		});
		$("body").on('mouseup', 'table#draggable-table tbody', function (event)
		{
			$('html,body').css('cursor', 'default');
		});
		$("body").on('click', 'button#add-new-row', function (event)
		{
			var tr = $("tbody#draggable-table-rows tr:last");
			if ( !tr ) {
				tr = $("tbody#draggable-table-rows");
			}
			add_new_row(tr);
		});
		$("body").on('click', 'span.new-row', function (event)
		{
			var tr = $(this).closest('tr');
			add_new_row(tr);
		});
		$("body").on('click', 'span.delete-row', function (event)
		{
			var answer = confirm(message.delete);
			if ( answer ) {
				var tr = $(this).closest('tr');
				$(tr).remove();
			}
		});
		$("body").on('click', 'span.move-up', function (event)
		{
			var current_row = $(this).closest('tr');
			var previous_row = current_row.prev();
			if ( previous_row.length ) {
				previous_row.before(current_row);
			}
			table_row_repositioning_method();
		});
		$("body").on('click', 'span.move-down', function (event)
		{
			var current_row = $(this).closest('tr');
			var next_row = current_row.next();
			if ( next_row.length ) {
				next_row.after(current_row);
			}
			table_row_repositioning_method();
		});
		$("form#rule-update").on('submit', function (event)
		{
			//event.preventDefault();
			var i = 1;
			var left_blnak = false;
			$("table#draggable-table tbody#draggable-table-rows tr").each(function ()
			{
				var tr = $(this);
				var textbox_value = $(tr).find('input[type="text"]').eq(0).val();
				if ( !textbox_value ) {
					left_blnak = true;
				}
				var hidden_rule_order = $(tr).find('input.hidden-rule-order');
				$(hidden_rule_order).val(i);

				var is_selected = $(tr).find('td:eq(0) input').is(':checked') ? 1 : 0;
				var hidden_line_item_field = $(tr).find('input.hidden-line-item-field');
				$(hidden_line_item_field).val(is_selected);

				++i;
			});

			if ( left_blnak ) {
				alert('rule name field is left blank. Please correct!');
				return false;
			}
		});
	</script>--}}
</body>
</html>