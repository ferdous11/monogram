<?php namespace Monogram;


use App\Parameter;
use App\Setting;
use App\Station;
use Illuminate\Support\Facades\DB;

class Helper
{
	public static $column_names = [ ];
	public static $columns = [ ];

	public static function jsonTransformer ($json, $separator = null)
	{
		if ( null === $separator ) {
			$separator = "\n";
		}
		$formatted_string = '';

		foreach ( json_decode($json, true) as $key => $value ) {
			$formatted_string .= sprintf("%s = %s%s", str_replace("_", " ", $key), $value, $separator);
		}

		return $formatted_string;
	}

	public static function dateTransformer ($date)
	{
		return date("F j, Y / g:i a", strtotime($date));
	}

	public static function getNextStationName ($batch_route_id, $current_station_name)
	{
		$batch_route_id = $batch_route_id;
		$current_station_name = $current_station_name;
		$current_station = Station::where('station_name', $current_station_name)
								  ->first();
		if ( !$current_station ) {
			return null;
		}
		$current_station_id = $current_station->id;

		$next_stations = DB::select(sprintf("SELECT * FROM batch_route_station WHERE batch_route_id = %d and id > ( SELECT id FROM batch_route_station WHERE batch_route_id = %d AND station_id = %d)", $batch_route_id, $batch_route_id, $current_station_id));

		if ( count($next_stations) ) {
			return Station::find($next_stations[0]->station_id)->station_name;
		} else {
			return null;
		}
	}

	public static function getSupervisorStationName ()
	{
		return Setting::first()->supervisor_station;
	}

	public static function validateSkuImportFile ($store_id, $row)
	{
		$parameters = Parameter::where('store_id', $store_id)
							   ->where('is_deleted', 0)
							   ->get();
		self::$column_names = $parameters->lists('parameter_value')
										 ->toArray();
		self::$columns = $parameters->lists('id', 'parameter_value')
									->toArray();

		#$parameters->lists('parameter_value')->toArray()
		return count($parameters) && ( self::$column_names == $row );
	}
}