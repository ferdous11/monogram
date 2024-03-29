<?php

namespace App\Http\Controllers;

use App\Option;
use App\Parameter;
use App\Store;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\MessageBag;
use League\Csv\Reader;
use League\Csv\Writer;
use Monogram\Helper;

class LogisticsController extends Controller
{
	public function sku_converter (Request $request)
	{
		$store_id = $request->get('store_id');
		$stores = Store::where('is_deleted', 0)
					   ->latest()
					   ->lists('store_name', 'store_id')
					   ->prepend('Select a store', 'all');

		$parameters = new Collection();
		if ( $store_id ) {
			$parameters = Parameter::where('store_id', $store_id)
								   ->where('is_deleted', 0)
								   ->get();
		}
		$index = 1;

		return view('logistics.sku_converter', compact('stores', 'store_id', 'parameters', 'index'));
	}

	public function post_sku_converter (Request $request)
	{
		$store_id = $request->get('store_id');
		$store_name = $request->get('store_name');
		$store = Store::where('store_id', $store_id)
					  ->where('is_deleted', 0)
					  ->first();

		if ( !$store ) {
			$store = new Store();
			$store->store_id = $store_id;
			$store->store_name = $store_name;
			$store->save();
		}

		if ( $request->has('parameters') ) {
			$this->insert_parameters_into_table($request->get('parameters'), $store_id);
		}

		return redirect(url(sprintf('logistics/sku_converter?store_id=%s', $store_id)));
	}

	public function sku_converter_update (Request $request, $store_id)
	{
		Parameter::where('store_id', $store_id)
				 ->delete();
		if ( $request->has('parameters') ) {
			/*foreach ( $request->get('parameters') as $parameter_value ) {
				$parameter = new Parameter();
				$parameter->store_id = $store_id;
				$parameter->parameter_value = trim($parameter_value);
				$parameter->save();
			}*/
			$this->insert_parameters_into_table($request->get('parameters'), $store_id);
		}

		return redirect(url(sprintf('logistics/sku_converter?store_id=%s', $store_id)));
	}

	private function insert_parameters_into_table ($parameters, $store_id)
	{
		foreach ( $parameters as $parameter_value ) {
			$parameter = new Parameter();
			$parameter->store_id = $store_id;
			$parameter->parameter_value = trim($parameter_value);
			$parameter->save();
		}
	}

	public function get_sku_import ()
	{
		/*$stores = Store::where('is_deleted', 0)
					   ->latest()
					   ->lists('store_name', 'store_id')
					   ->prepend('Select a store', 'all');*/
		$stores = Store::with('parameters')
					   ->where('is_deleted', 0)
					   ->latest()
					   ->get();

		$store_parameters = [ ];

		foreach ( $stores as $store ) {
			$list = "<ol class=\"list-group\">";
			foreach ( $store->parameters as $parameter ) {
				$list .= sprintf("<li class=\"list-group-item\">%s</li>", $parameter->parameter_value);
			}
			$list .= "</ol>";
			$store_parameters[$store->store_id] = $list;
		}

		#return $store_parameters;
		return view('logistics.sku_import', compact('stores', 'store_parameters'));
	}

	public function post_sku_import (Request $request)
	{
		$store_id = $request->get('store_id');
		if ( $request->get('action') == 'export' ) {
			$parameters = Parameter::where('store_id', $store_id)
								   ->get();
			$columns = $parameters->lists('parameter_value')
								  ->toArray();
			$options = Option::where('store_id', $store_id)
							 ->whereIn('parameter_id', $parameters->lists('id')
																  ->toArray())
							 ->get();

			$file_path = sprintf("%s/assets/exports/skus/", base_path());
			$file_name = sprintf("skus_exports-%s-%s.csv", date("y-m-d", strtotime('now')), str_random(5));
			$fully_specified_path = sprintf("%s%s", $file_path, $file_name);

			$csv = Writer::createFromFileObject(new \SplFileObject($fully_specified_path, 'a+'), 'w');
			$csv->insertOne($columns);
			foreach ( $options->chunk(count($columns)) as $option ) {
				$row = [ ];
				foreach ( $option as $column_value ) {
					$row[] = $column_value->parameter_option;
				}
				$csv->insertOne($row);
			}

			return response()->download($fully_specified_path);
		}

		// if the request is not export
		// proceed further.
		$file = $request->file('file');

		$mimes = [
			'application/vnd.ms-excel',
			'text/plain',
			'text/csv',
			'text/tsv',
		];
		if ( !in_array($file->getClientMimeType(), $mimes) ) {
			return redirect()
				->back()
				->withErrors(new MessageBag([ 'error' => 'Uploaded file is not a valid CSV file.' ]));
		}

		$file_path = sprintf("%s/assets/imports/products/", base_path());
		$file_name = $file->getClientOriginalName();
		$fully_specified_file_name = sprintf("%s%s", $file_path, $file_name);
		$file->move($file_path, $file_name);

		try {
			$reader = Reader::createFromPath($fully_specified_file_name);
		} catch ( \Exception $ex ) {
			return redirect()
				->back()
				->withErrors(new MessageBag([ 'error' => 'Uploaded file is not a valid CSV file.' ]));
		}

		$row = $reader->fetchOne();
		$is_valid = Helper::validateSkuImportFile($store_id, $row);

		if ( !$is_valid ) {
			return redirect()
				->back()
				->withErrors(new MessageBag([
					'error' => sprintf('Column names / values do not match with the parameters with <b>%s</b> store.', Store::where('store_id', $store_id)
																															->first()->store_name),
				]));
		}

		if ( $request->get('action') == 'validate' ) {
			Session::flash('success', sprintf("Uploaded file is a valid CSV file for <b>%s</b>", Store::where('store_id', $store_id)
																									  ->first()->store_name));

			return redirect()->back();
		}

		if ( $request->get('action') == 'upload' ) {
			$rows = $reader->setOffset(1)
						   ->fetchAssoc(Helper::$column_names);
			foreach ( $rows as $row ) {
				foreach ( Helper::$column_names as $column_name ) {
					$option = new Option();
					$option->store_id = $store_id;
					$option->parameter_id = Helper::$columns[$column_name];
					$option->parameter_option = $row[$column_name];
					$option->save();
				}
			}
		} else {
			return redirect()
				->back()
				->withErrors(new MessageBag([
					'error' => sprintf('Sorry, The operation cannot be processed'),
				]));
		}

		return redirect()->back();

	}
}
