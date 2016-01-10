<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\OrderCreateRequest;
use App\Http\Requests\OrderUpdateRequest;

class OrderController extends Controller
{
    public function index ()
    {
        $orders = Order::where('is_deleted', 0)->paginate(50);
        $count = 1;

        return view('orders.index', compact('orders', 'count'));
    }

    public function create ()
    {
        return view('orders.create');
    }

    public function store (OrderCreateRequest $request)
    {
        $order = new Order();
        $order->order_id = $request->get('order_id');
        $order->email = $request->get('email');
        $order->customer_id = $request->get('customer_id');
        $order->placed_by = $request->get('placed_by');
        $order->store_id = $request->get('store_id');
        $order->market = $request->get('market');
        $order->order_date = $request->get('order_date');
        $order->paid = $request->get('paid');
        $order->payment_method = $request->get('payment_method');
        $order->sub_total = $request->get('sub_total');
        $order->shipping_cost = $request->get('shipping_cost');
        $order->discount = $request->get('discount');
        $order->gift_wrap_cost = $request->get('gift_wrap_cost');
        $order->tax = $request->get('tax');
        $order->adjustment = $request->get('adjustment');
        $order->order_total = $request->get('order_total');
        $order->fraud_score = $request->get('fraud_score');
        $order->coupon_name = $request->get('coupon_name');
        $order->shipping_method = $request->get('shipping_method');
        $order->four_pl_unique_id = $request->get('four_pl_unique_id');
        $order->short_order = $request->get('short_order');
        $order->order_comments = $request->get('order_comments');
        $order->item_name = $request->get('item_name');
        $order->item_code = $request->get('item_code');
        $order->item_id = $request->get('item_id');
        $order->item_qty = $request->get('item_qty');
        $order->item_price = $request->get('item_price');
        $order->item_cost = $request->get('item_cost');
        $order->item_options = $request->get('item_options');
        $order->trk = $request->get('trk');
        $order->ship_date = $request->get('ship_date');
        $order->shipping_carrier = $request->get('shipping_carrier');
        $order->drop_shipper = $request->get('drop_shipper');
        $order->return_request_code = $request->get('return_request_code');
        $order->return_request_date = $request->get('return_request_date');
        $order->return_disposition_code = $request->get('return_disposition_code');
        $order->return_date = $request->get('return_date');
        $order->rma = $request->get('rma');
        $order->d_s_purchase_order = $request->get('d_s_purchase_order');
        $order->wf_batch = $request->get('wf_batch');
        $order->order_status = $request->get('order_status');
        $order->source = $request->get('source');
        $order->cancel_code = $request->get('cancel_code');
        $order->save();

        return redirect(url('orders'));
    }

    public function show ($id)
    {
        $order = Order::find($id);
        if ( !$order ) {
            return view('errors.404');
        }

        return view('orders.show', compact('order'));
    }

    public function edit ($id)
    {
        $order = Order::find($id);
        if ( !$order ) {
            return view('errors.404');
        }

        return view('orders.edit', compact('order'));
    }

    public function update (OrderUpdateRequest $request, $id)
    {
        $order = Order::find($id);
        if ( !$order ) {
            return view('errors.404');
        }

        $order->order_id = $request->get('order_id');
        $order->email = $request->get('email');
        $order->customer_id = $request->get('customer_id');
        $order->placed_by = $request->get('placed_by');
        $order->store_id = $request->get('store_id');
        $order->market = $request->get('market');
        $order->order_date = $request->get('order_date');
        $order->paid = $request->get('paid');
        $order->payment_method = $request->get('payment_method');
        $order->sub_total = $request->get('sub_total');
        $order->shipping_cost = $request->get('shipping_cost');
        $order->discount = $request->get('discount');
        $order->gift_wrap_cost = $request->get('gift_wrap_cost');
        $order->tax = $request->get('tax');
        $order->adjustment = $request->get('adjustment');
        $order->order_total = $request->get('order_total');
        $order->fraud_score = $request->get('fraud_score');
        $order->coupon_name = $request->get('coupon_name');
        $order->shipping_method = $request->get('shipping_method');
        $order->four_pl_unique_id = $request->get('four_pl_unique_id');
        $order->short_order = $request->get('short_order');
        $order->order_comments = $request->get('order_comments');
        $order->item_name = $request->get('item_name');
        $order->item_code = $request->get('item_code');
        $order->item_id = $request->get('item_id');
        $order->item_qty = $request->get('item_qty');
        $order->item_price = $request->get('item_price');
        $order->item_cost = $request->get('item_cost');
        $order->item_options = $request->get('item_options');
        $order->trk = $request->get('trk');
        $order->ship_date = $request->get('ship_date');
        $order->shipping_carrier = $request->get('shipping_carrier');
        $order->drop_shipper = $request->get('drop_shipper');
        $order->return_request_code = $request->get('return_request_code');
        $order->return_request_date = $request->get('return_request_date');
        $order->return_disposition_code = $request->get('return_disposition_code');
        $order->return_date = $request->get('return_date');
        $order->rma = $request->get('rma');
        $order->d_s_purchase_order = $request->get('d_s_purchase_order');
        $order->wf_batch = $request->get('wf_batch');
        $order->order_status = $request->get('order_status');
        $order->source = $request->get('source');
        $order->cancel_code = $request->get('cancel_code');
        $order->save();

        return redirect(url('orders'));
    }

    public function destroy ($id)
    {
        // JAZLYN.CARTAGENA926@GMAIL.COM
        $order = Order::find($id);
        if ( !$order ) {
            return view('errors.404');
        }
        $order->is_deleted = 1;
        $order->save();

        return redirect(url('orders'));

    }
}
