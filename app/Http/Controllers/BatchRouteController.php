<?php

namespace App\Http\Controllers;

use App\BatchRoute;
use App\Station;
use Illuminate\Http\Request;

use App\Http\Requests\BatchRouteCreateRequest;
use App\Http\Requests\BatchRouteUpdateRequest;
use App\Http\Controllers\Controller;

class BatchRouteController extends Controller
{
    public function index()
    {
        $count = 1;
        $stations = Station::where('is_deleted', 0)->lists('station_description', 'id');
        $batch_routes = BatchRoute::with('stations_list')->where('is_deleted', 0)->paginate(50);
        return view('batch_routes.index', compact('batch_routes', 'count', 'stations'));
    }

    public function create()
    {
        $stations = Station::where('is_deleted', 0)->lists('station_description', 'id');
        return view('batch_routes.create', compact('stations'));
    }

    public function store(BatchRouteCreateRequest $request)
    {
        $batch_route = new BatchRoute();
        $batch_route->batch_code = $request->get('batch_code');
        $batch_route->batch_route_name = $request->get('batch_route_name');
        $batch_route->batch_max_units = $request->get('batch_max_units');
        $batch_route->batch_options = $request->get('batch_options');
        $batch_route->save();
        $batch_route->stations()->attach($request->get('batch_stations'));
        return redirect(url('batch_routes'));
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(BatchRouteUpdateRequest $request, $id)
    {
        $batch_route = BatchRoute::find($id);
        $batch_route->batch_code = $request->get('batch_code');
        $batch_route->batch_route_name = $request->get('batch_route_name');
        $batch_route->batch_max_units = $request->get('batch_max_units');
        $batch_route->batch_options = $request->get('batch_options');
        $batch_route->save();

        $updateStationText = preg_replace('/\s+/', '', $request->get('batch_stations'));
        $updatedStationsArray = explode(",", $updateStationText);
        $newStations = Station::whereIn('station_name', $updatedStationsArray)->lists('id')->toArray();
        $batch_route->stations()->sync($newStations);

        return redirect(url('batch_routes'));
    }

    public function destroy($id)
    {
        $batch_route = BatchRoute::find($id);
        $batch_route->is_deleted = 1;
        $batch_route->save();
        return redirect(url('batch_routes'));
    }
}
