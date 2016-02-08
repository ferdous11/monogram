<?php

namespace App\Http\Controllers;

use App\Rule;
use App\RuleAction;
use App\RuleTrigger;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\MessageBag;

class RuleController extends Controller
{
	private $relations = [
		'<',
		'<=',
		'=',
		'>',
		'>=',
		'IN',
	];

	private $trigger_parameters = [
		''     => 'Select Parameter',
		'VAL'  => 'Items Value ($)',
		'OT'   => 'Order total ($)',
		'NUM'  => 'Number of items',
		'DOM'  => 'Domestic/International',
		'WGT'  => 'Weight (Lbs.)',
		'SHIP' => 'Selected shipping method by customer',
		'STAT' => 'Ship to state list',
		'SKU'  => 'SKUs list',
		'MKT'  => 'Store',
	];

	private $action_parameters = [
		''    => 'Select Parameter',
		'CAR' => 'Carrier',
		'CLS' => 'Shipping class',
		'INS' => 'Insurance',
		'PKG' => 'Package shape',
		'SIG' => 'Signature Confirmation',
		'ADW' => 'Add weight (Oz)',
	];

	private $trigger_parameter_keys = [
		"",
		"VAL",
		"OT",
		"NUM",
		"DOM",
		"WGT",
		"SHIP",
		"STAT",
		"SKU",
		"MKT",
	];

	private $action_parameter_keys = [
		"",
		"CAR",
		"CLS",
		"INS",
		"PKG",
		"SIG",
		"ADW",
	];


	public function index ()
	{
		$rules = Rule::where('is_deleted', 0)
					 ->orderBy(DB::raw('rule_display_order + 0'), 'asc')
					 ->paginate(50);
		$suggested_display_order = $this->next_display_order_value();

		return view('rules.index', compact('rules', 'suggested_display_order'));
	}

	public function create ()
	{
		//
	}

	public function store (Request $request)
	{
		$rule_name = $request->get('rule_name');
		if ( !$rule_name ) {
			return redirect()
				->back()
				->withErrors(new MessageBag([ 'error' => 'Rule name cannot be empty', ]));
		}

		$rule = new Rule();
		$rule->rule_name = $request->get('rule_name');
		$rule->rule_display_order = $request->get('rule_display_order') ? intval($request->get('rule_display_order')) : $this->next_display_order_value();
		$rule->save();

		return redirect(url('rules'));
	}

	public function show ($id)
	{
		$rule = Rule::with('triggers', 'actions')
					->find($id);
		if ( !$rule ) {
			return redirect()
				->back()
				->withErrors(new MessageBag([ 'error' => 'Invalid rule selected', ]));
		}
		$trigger_parameters = $this->trigger_parameters;
		$action_parameters = $this->action_parameters;
		$trigger_relations = array_combine($this->relations, $this->relations);

		return view('rules.show', compact('rule', 'trigger_parameters', 'action_parameters', 'trigger_relations'));
	}

	public function edit ($id)
	{
	}

	public function update (Request $request, $id)
	{
		#return $request->all();
		$rule_name = $request->get('rule_name');
		if ( !$rule_name ) {
			return redirect()
				->back()
				->withErrors(new MessageBag([ 'error' => 'Rule name cannot be empty', ]));
		}

		$rule = Rule::find($id);
		if ( !$rule ) {
			return redirect()
				->back()
				->withErrors(new MessageBag([ 'error' => 'Invalid rule selected', ]));
		}

		$rule->rule_name = $request->get('rule_name');
		$rule->rule_display_order = $request->get('rule_display_order') ? intval($request->get('rule_display_order')) : $this->next_display_order_value();
		$rule->save();

		return redirect(url('rules'));
	}

	public function destroy ($id)
	{
		$rule = Rule::find($id);
		if ( !$rule ) {
			return redirect()
				->back()
				->withErrors(new MessageBag([ 'error' => 'Invalid rule selected', ]));
		}
		$rule->is_deleted = 1;
		$rule->save();

		return redirect(url('rules'));
	}

	private function max_display_order_inserted ()
	{
		$rule = Rule::where('is_deleted', 0)
					->orderBy(DB::raw('rule_display_order + 0'), 'desc')
					->first();
		if ( $rule ) {
			return intval($rule->rule_display_order);
		}

		return 0;
	}

	private function next_display_order_value ()
	{
		return $this->max_display_order_inserted() + 1;
	}

	public function bulk_update (Request $request, $id)
	{
		$rule = Rule::find($id);
		if ( !$rule ) {
			return redirect()
				->back()
				->withErrors(new MessageBag([ 'error' => 'Invalid rule selected', ]));
		}

		RuleTrigger::where('rule_id', $id)
				   ->delete();
		RuleAction::where('rule_id', $id)
				  ->delete();

		$index = 0;
		foreach ( $request->get('trigger_type') as $trigger_parameter ) {
			$rule_trigger_parameter = $trigger_parameter;
			$rule_trigger_relation = $request->get('trigger_relation')[$index];
			$rule_trigger_value = $request->get('trigger_value')[$index];
			if ( $rule_trigger_value ) {
				$rule_trigger = new RuleTrigger();
				$rule_trigger->rule_id = $rule->id;
				$rule_trigger->rule_trigger_parameter = $rule_trigger_parameter;
				$rule_trigger->rule_trigger_relation = $rule_trigger_relation;
				$rule_trigger->rule_trigger_value = $rule_trigger_value;
				$rule_trigger->save();
			}
			$index++;
		}

		$index = 0;
		foreach ( $request->get('action_type') as $action_parameter ) {
			$rule_action_parameter = $action_parameter;
			$rule_action_value = $request->get('action_value')[$index];
			if ( $rule_action_value ) {
				$rule_action = new RuleAction();
				$rule_action->rule_id = $rule->id;
				$rule_action->rule_action_parameter = $rule_action_parameter;
				$rule_action->rule_action_value = $rule_action_value;
				$rule_action->save();
			}
			$index++;
		}

		Session::flash('success', sprintf("Rule <b>%s</b> is updated successfully", $rule->rule_name));

		return redirect(url('rules'));
	}
}
