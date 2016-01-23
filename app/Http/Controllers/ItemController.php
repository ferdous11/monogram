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
		$batch_routes = BatchRoute::with([
			'itemGroups' => function ($q) {
				return $q->join('items', 'products.id_catalog', '=', 'items.item_id')
						 ->where('items.is_deleted', 0)
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

		return view('items.create_batch', compact('batch_routes', 'count'));
	}

	public function postBatch (Request $request)
	{
		return $request->all();
	}
}
