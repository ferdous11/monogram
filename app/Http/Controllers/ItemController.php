<?php

namespace App\Http\Controllers;

use App\BatchRoute;
use App\Item;
use App\Product;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
	public function index (Request $request)
	{
		$items = Item::with('order.customer', 'store', 'route.stations_list')
					 ->where('is_deleted', 0)
					 ->search($request->get('search_for'), $request->get('search_in'))
					 ->latest()
					 ->paginate(50);

		$unassigned = Item::whereNull('batch_number')
						  ->where('is_deleted', 0)
						  ->count();
		$unassignedProductCount = Product::whereNull('batch_route_id')
										 ->where('is_deleted', 0)
										 ->count();
		$search_in = [
			'all'                 => 'All',
			'order'               => 'Order',
			'order_date'          => 'Order date',
			'store_id'            => 'Store',
			'state'               => 'State',
			'description'         => 'Description',
			'item_id'             => 'SKU',
			'batch'               => 'Batch',
			'batch_creation_date' => 'Batch Creation date',
		];

		#return $items;
		return view('items.index', compact('items', 'search_in', 'request', 'unassigned', 'unassignedProductCount'));
	}

	public function getBatch ()
	{
		$count = 1;
		$serial = 1;
		$batch_routes = BatchRoute::with([
			'stations_list',
			'itemGroups' => function ($q) {
				return $q->join('items', 'products.id_catalog', '=', 'items.item_id')
						 ->where('items.is_deleted', 0)
						 ->whereNull('items.batch_number')
						 ->join('orders', 'orders.order_id', '=', 'items.order_id')
						 ->where('orders.is_deleted', 0)
						 ->addSelect([
							 DB::raw('items.id AS item_table_id'),
							 'items.item_id',
							 'items.order_id',
							 'items.item_quantity',
							 DB::raw('orders.id as order_table_id'),
							 'orders.order_id',
							 'orders.order_date',
						 ]);
			},
		])
								  ->where('batch_routes.is_deleted', 0)
								  ->get();

		#return $batch_routes;

		return view('items.create_batch', compact('batch_routes', 'count', 'serial'));
	}

	public function postBatch (Request $request)
	{
		$today = date('ymd', strtotime('now'));
		$batches = $request->get('batches');

		$acceptedGroups = [ ];
		/*
		 * $max_batch_id = 0;
		 * $last_assigned_batch = Item::whereNotNull('batch_number')
								   ->latest()
								   ->first();
		if ( $last_assigned_batch ) {
			$max_batch_id = explode("~", $last_assigned_batch->batch_number)[2];
		}*/

		$items = Item::where('batch_number', 'LIKE', sprintf("%s%%", $today))
					 ->groupBy('batch_number')
					 ->get();
		$last_batch_number = count($items);
		$current_group = -1;

		foreach ( $batches as $preferredBatch ) {
			list( $inGroup, $batch_route_id, $item_id ) = explode("|", $preferredBatch);
			if ( $inGroup != $current_group ) {
				#$max_batch_id++;
				$last_batch_number++;
				$current_group = $inGroup;
			}
			#$batch_code = BatchRoute::find($batch_route_id)->batch_code;
			#$proposedBatch = sprintf("%s~%s~%s", $today, $batch_code, $max_batch_id);
			$proposedBatch = sprintf("%s%04d", $today, $last_batch_number);

			$acceptedGroups[$inGroup][] = [
				$item_id,
				$proposedBatch,
				$batch_route_id,
			];
		}

		#return $acceptedGroups;
		foreach ( $acceptedGroups as $groups ) {
			foreach ( $groups as $itemGroup ) {
				$item_id = $itemGroup[0];
				$batch_number = $itemGroup[1];
				$batch_route_id = $itemGroup[2];

				$item = Item::find($item_id);
				$item->batch_number = $batch_number;
				$item->batch_route_id = $batch_route_id;
				$batch = BatchRoute::with('stations_list')
								   ->find($batch_route_id);
				$item->station_name = $batch->stations_list[0]->station_name;
				$item->batch_creation_date = date('Y-m-d H:i:s', strtotime('now'));
				$item->save();
			}
		}

		return redirect(url('items/grouped'));
	}

	public function getGroupedBatch ()
	{
		$itemGroups = Item::with('groupedItems', 'order')
						  ->where('is_deleted', 0)
						  ->whereNotNull('batch_number')
						  ->groupBy('batch_number')
						  ->latest('batch_creation_date')
						  ->paginate(50);

		#return $itemGroups;
		$count = 1;
		$serial = 1;

		return view('items.item_groups', compact('itemGroups', 'count', 'serial'));
	}
}
