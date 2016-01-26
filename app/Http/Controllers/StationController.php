<?php

namespace App\Http\Controllers;


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
}
