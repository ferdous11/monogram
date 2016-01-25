<?php

namespace App\Http\Controllers;

use App\BatchRoute;
use App\Item;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
	public function index (Request $request)
	{
		$items = Item::with('order.customer')
					 ->where('is_deleted', 0)
					 ->orderId($request->get('search_for'), $request->get('search_in'))
					 ->paginate(50);
		$unassigned = Item::whereNull('batch_number')
						  ->where('is_deleted', 0)
						  ->count();
		$search_in = [
			'order'         => 'Order',
			'five_p'        => '5P#',
			'ebay-item'     => 'Ebay-item',
			'ebay-user'     => 'Ebay-user',
			'ebay-sale-rec' => 'Ebay-sale-rec',
			'shipper-po'    => 'Shipper-PO',
		];

		#return $items;
		return view('items.index', compact('items', 'search_in', 'request', 'unassigned'));
	}

	public function getBatch ()
	{
		/*$batch_routes = BatchRoute::with('products.groupedItems.order', 'stations_list')
								  ->where('is_deleted', 0)
								  ->paginate(500, [
									  'id',
									  'batch_code',
									  'batch_route_name',
									  'batch_max_units',
								  ]);*/
		$count = 1;
		$serial = 1;
		$batch_routes = BatchRoute::with([
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
		], 'stations_list')
								  ->where('batch_routes.is_deleted', 0)
								  ->get();

		#return $batch_routes;

		return view('items.create_batch', compact('batch_routes', 'count', 'serial'));
	}

	public function postBatch (Request $request)
	{
		$today = date('Ymd', strtotime('now'));
		$batches = $request->get('batches');

		$acceptedGroups = [ ];

		$last_assigned_batch = Item::whereNotNull('batch_number')
								   ->latest()
								   ->first();

		$max_batch_id = 0;
		if ( $last_assigned_batch ) {
			$max_batch_id = explode("~", $last_assigned_batch->batch_number)[2];
		}

		$current_group = -1;

		foreach ( $batches as $preferredBatch ) {
			list( $inGroup, $batch_route_id, $item_id ) = explode("|", $preferredBatch);
			if ( $inGroup != $current_group ) {
				$max_batch_id++;
				$current_group = $inGroup;
			}
			$batch_code = BatchRoute::find($batch_route_id)->batch_code;
			$proposedBatch = sprintf("%s~%s~%s", $today, $batch_code, $max_batch_id);

			$acceptedGroups[$inGroup][] = [
				$item_id,
				$proposedBatch,
			];
		}
		foreach ( $acceptedGroups as $groups ) {
			foreach ( $groups as $itemGroup ) {
				$item_id = $itemGroup[0];
				$batch_number = $itemGroup[1];

				$item = Item::find($item_id);
				$item->batch_number = $batch_number;
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
						  ->latest()
						  ->paginate(50);

		#return $itemGroups;
		$count = 1;
		$serial = 1;

		return view('items.item_groups', compact('itemGroups', 'count', 'serial'));
	}
}
