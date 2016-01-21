<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

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

        return view('items.index', compact('items', 'search_in', 'request', 'unassigned'));
    }
}
