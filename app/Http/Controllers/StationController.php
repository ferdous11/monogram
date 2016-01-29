<?php

namespace App\Http\Controllers;


use App\BatchRoute;
use App\Item;
use Illuminate\Http\Request;
use App\Station;

use App\Http\Requests\StationCreateRequest;
use App\Http\Requests\StationUpdateRequest;

class StationController extends Controller
{
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
		if ( $action == 'forward' ) {
			$batch_route_id = $item->batch_route_id;
			$station_name = $item->station_name;
			$station = Station::where('station_name', $station_name)
							  ->first();
			$station_id = $station->id;

			$next_station = BatchRoute::with([
				'stations' => function ($query) use ($station_id) {
					return $query->where('station_id', '>', $station_id);
				},
			])
									  ->find($batch_route_id);

			#return $next_station;
			if ( count($next_station->stations) ) {
				$item->station_name = $next_station->stations[0]->station_name;
			} else {
				$item->station_name = null;
			}

			$item->save();
		} elseif ( $action == 'back' ) {
			$item->station_name = -1;
			$item->save();
		}

		return redirect()->back();
	}

	public function supervisor ()
	{
		$items = Item::with('route.stations_list', 'order')
					 ->where('is_deleted', 0)
					 ->whereNotNull('batch_number')
					 ->where('station_name', '-1')
					 ->paginate(50);

		return view('stations.supervisor', compact('items'));
	}

	public function assign_to_station (Request $request)
	{
		$item_id = $request->get('item_id');
		$station_name = $request->get('station_name');
		$item = Item::find($item_id);
		$item->station_name = $station_name;
		$item->save();

		return redirect()->back();
	}
}
