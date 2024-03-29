<?php

namespace App\Http\Controllers;


use App\BatchRoute;
use App\Item;
use Illuminate\Http\Request;
use App\Station;

use App\Http\Requests\StationCreateRequest;
use App\Http\Requests\StationUpdateRequest;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Monogram\Helper;

class StationController extends Controller
{
	private $statuses = [
		'active'      => 'Active',
		'not started' => 'Not started',
		'completed'   => 'Completed',
	];

	public function index ()
	{
		$count = 1;
		$stations = Station::where('is_deleted', 0)
						   ->latest()
						   ->paginate(50);

		return view('stations.index', compact('stations', 'count'));
	}

	public function create ()
	{
		return view('stations.create');
	}

	public function store (StationCreateRequest $request)
	{
		$station = new Station();
		$station->station_name = trim($request->get('station_name'));
		$station->station_description = $request->get('station_description');
		$station->save();

		return redirect(url('stations'));
	}

	public function show ($id)
	{
		$station = Station::where('is_deleted', 0)
						  ->find($id);

		if ( !$station ) {
			return view('errors.404');
		}

		return view('stations.show', compact('station'));
	}

	public function edit ($id)
	{
		$station = Station::where('is_deleted', 0)
						  ->find($id);

		if ( !$station ) {
			return view('errors.404');
		}

		return view('stations.edit', compact('station'));
	}

	public function update (StationUpdateRequest $request, $id)
	{
		$station = Station::where('is_deleted', 0)
						  ->find($id);

		if ( !$station ) {
			return view('errors.404');
		}

		$station->station_name = trim($request->get('station_name'));
		$station->station_description = $request->get('station_description');
		$station->save();

		return redirect(url('stations'));
	}

	public function destroy ($id)
	{
		$station = Station::where('is_deleted', 0)
						  ->find($id);

		if ( !$station ) {
			return view('errors.404');
		}

		$station->is_deleted = 1;
		$station->save();

		return redirect(url('stations'));
	}

	public function status (Request $request)
	{
		$station_name = $request->get('station_name');
		$stations = Station::where('is_deleted', 0)
						   ->lists('station_description', 'station_name');
		$stations->prepend('All', 'all');
		$items = [ ];
		if ( $station_name && $station_name != 'all' ) {
			$items = Item::where('station_name', $station_name)
						 ->where('is_deleted', 0)
						 ->paginate(50);
		}

		return view('stations.status', compact('station_name', 'stations', 'items', 'request'));
	}

	public function my_station ()
	{
		$station_id = session('station_id');
		$station = Station::find($station_id);
		if ( !$station ) {
			return view('errors.404');
		}
		$items = Item::where('station_name', $station->station_name)
					 ->where('is_deleted', 0)
					 ->paginate(50);
		$station_description = $station->station_description;

		return view('stations.my_station', compact('items', 'station_description'));

	}

	public function change (Request $request)
	{
		$action = $request->get('action');
		$item_id = $request->get('item_id');

		$item = Item::find($item_id);
		if ( !$item ) {
			return view('errors.404');
		}
		if ( $action == 'done' ) {
			$batch_route_id = $item->batch_route_id;
			$current_station_name = $item->station_name;
			/*$current_station = Station::where('station_name', $current_station_name)
									  ->first();
			if ( !$current_station ) {
				return redirect()->back();
			}
			$current_station_id = $current_station->id;

			$next_stations = DB::select(sprintf("SELECT * FROM batch_route_station WHERE batch_route_id = %d and id > ( SELECT id FROM batch_route_station WHERE batch_route_id = %d AND station_id = %d)", $batch_route_id, $batch_route_id, $current_station_id));

			#return $next_stations;
			if ( count($next_stations) ) {
				$item->station_name = Station::find($next_stations[0]->station_id)->station_name;
			} else {
				$item->station_name = null;
			}*/

			$next_station_name = Helper::getNextStationName($batch_route_id, $current_station_name);
			$item->station_name = $next_station_name;
			$item->save();
		} elseif ( $action == 'reject' ) {
			$item->station_name = Helper::getSupervisorStationName();
			$item->rejection_message = trim($request->get('rejection_message'));
			$item->save();
		}

		return redirect()->back();
	}

	public function supervisor (Request $request)
	{
		$routes = BatchRoute::where('is_deleted', 0)
							->latest()
							->lists('batch_route_name', 'id')
							->prepend('Select a route', 'all');

		$stations = Station::where('is_deleted', 0)
						   ->latest()
						   ->lists('station_description', 'id')
						   ->prepend('Select a station', 'all');

		$statuses = (new Collection($this->statuses))->prepend('Select status', 'all');

		$items = null;
		if ( count($request->all()) ) {
			$items = Item::with('route.stations_list', 'order')
						 ->searchBatch($request->get('batch'))
						 ->searchRoute($request->get('route'))
						 ->searchStatus($request->get('status'))
						 ->searchStation($request->get('station'))
						 ->searchOptionText($request->get('option_text'))
						 ->searchOrderIds($request->get('order_id'))
						 ->where('is_deleted', 0)
						 ->paginate(50);
		} else {
			$items = Item::with('route.stations_list', 'order')
						 ->where('is_deleted', 0)
						 ->whereNotNull('batch_number')
						 ->where('station_name', Helper::getSupervisorStationName())
						 ->paginate(50);
		}

		return view('stations.supervisor', compact('items', 'request', 'routes', 'stations', 'statuses'));
	}

	public function assign_to_station (Request $request)
	{
		$item_id = $request->get('item_id');
		$station_name = $request->get('station_name');
		$item = Item::find($item_id);
		$item->station_name = $station_name;
		$item->rejection_message = null;
		$item->save();

		return redirect()->back();
	}
}
