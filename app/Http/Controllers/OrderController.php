<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Item;
use App\Order;
use App\Product;
use App\Status;
use App\Store;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\OrderCreateRequest;
use App\Http\Requests\OrderUpdateRequest;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\MessageBag;
use Monogram\ApiClient;

class OrderController extends Controller
{
    private $store_id = '';

    public function index ()
    {
        $orders = Order::where('is_deleted', 0)
                       ->paginate(50);
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

    public function getList (Request $request)
    {
        $orders = Order::with('customer')
                       ->where('is_deleted', 0)
                       ->groupBy('order_id')
                       ->paginate(50, [
                           'order_id',
                           'customer_id',
                           'order_date',
                           'order_status',
                           'shipping_method',
                           DB::raw('COUNT( 1 ) AS item, SUM(order_total) AS cost'),
                       ]);
        $statuses = Status::where('is_deleted', 0)
                          ->lists('status_name', 'status_code');
        $statuses->prepend('All', 'all');

        $stores = Store::where('is_deleted', 0)
                       ->lists('store_name', 'store_id');
        $stores->prepend('All', 'all');

        $shipping_methods = Order::groupBy('shipping_method')
                                 ->lists('shipping_method', 'shipping_method');
        $shipping_methods->prepend('All', 'all');

        $search_in = [
            'order'         => 'Order',
            'five_p'        => '5P#',
            'ebay-item'     => 'Ebay-item',
            'ebay-user'     => 'Ebay-user',
            'ebay-sale-rec' => 'Ebay-sale-rec',
            'shipper-po'    => 'Shipper-PO',
        ];

        return view('orders.lists', compact('orders', 'stores', 'statuses', 'shipping_methods', 'search_in', 'request'));
    }

    public function search (Request $request)
    {
        $orders = Order::with('customer')
                       ->where('is_deleted', 0)
                       ->storeId($request->get('store'))
                       ->shippingMethod($request->get('shipping_method'))
                       ->status($request->get('status'))
                       ->search($request->get('search_for'), $request->get('search_in'))
                       ->groupBy('order_id')
                       ->paginate(50, [
                           'order_id',
                           'customer_id',
                           'order_date',
                           'order_status',
                           'shipping_method',
                           DB::raw('COUNT( 1 ) AS item, SUM(order_total) AS cost'),
                       ]);
        $statuses = Status::where('is_deleted', 0)
                          ->lists('status_name', 'status_code');
        $statuses->prepend('All', 'all');

        $stores = Store::where('is_deleted', 0)
                       ->lists('store_name', 'store_id');
        $stores->prepend('All', 'all');

        $shipping_methods = Order::groupBy('shipping_method')
                                 ->lists('shipping_method', 'shipping_method');
        $shipping_methods->prepend('All', 'all');

        $search_in = [
            'order'         => 'Order',
            'five_p'        => '5P#',
            'ebay-item'     => 'Ebay-item',
            'ebay-user'     => 'Ebay-user',
            'ebay-sale-rec' => 'Ebay-sale-rec',
            'shipper-po'    => 'Shipper-PO',
        ];

        return view('orders.lists', compact('orders', 'stores', 'statuses', 'shipping_methods', 'search_in', 'request'));
    }

    public function details ($order_id)
    {
        $order = Order::with('customer')
                      ->where('is_deleted', 0)
                      ->where('order_id', $order_id)
                      ->first([ DB::raw('orders.*, COUNT( 1 ) AS item, order_total AS cost') ]);
        #->groupBy('order_id')
        #->first([ DB::raw('orders.*, COUNT( 1 ) AS item, SUM(order_total) AS cost') ]);

        $statuses = Status::where('is_deleted', 0)
                          ->lists('status_name', 'status_code');

        $shipping_methods = Order::groupBy('shipping_method')
                                 ->lists('shipping_method', 'shipping_method');

        #return compact('order', 'order_id', 'shipping_methods', 'statuses');
        return view('orders.details', compact('order', 'order_id', 'shipping_methods', 'statuses'));
    }

    public function getAddOrder ()
    {
        $stores = Store::where('is_deleted', 0)
                       ->lists('store_name', 'store_id');

        return view('orders.add', compact('stores'));
    }

    public function postAddOrder (Request $request)
    {
        $order_ids = explode(",", trim(preg_replace('/\s+/', '', $request->get('order_id')), ","));
        $needed_api = '';
        $store = $request->get('store');
        if ( strpos($store, "yhst") !== false ) {
            $needed_api = 'yahoo';
        }
        $api_client = new ApiClient($order_ids, $store, $needed_api);
        list( $responses, $errors ) = $api_client->fetch_data();
        foreach ( $responses as $data ) {
            $this->store_id = $request->get('store');
            $order_id = $data[0];
            $response = $data[1];
            $success = $this->save_data($response);
            if ( $success === false ) {
                $errors->add(sprintf("Insertion error: %d", $order_id), sprintf("Error occurred while reading data from api for order id: %d.", $order_id));
            }
        }
        if ( $errors->count() ) {
            return redirect()
                ->back()
                ->withErrors($errors);
        }
        Session::flash('success', 'Order(s) are inserted successfully.');

        return redirect(url('orders/add'));
    }

    public function save_data ($response)
    {
        $xml = simplexml_load_string($response);
        if ( $xml === false ) {
            return false;
        }
        $RequestID = $xml->RequestID;

        foreach ( $xml->ResponseResourceList->OrderList->children() as $order ) {
            $insertOrder = new Order();

            $order_id = $order->OrderID;
            $full_order_id = sprintf("%s-%d", $this->store_id, $order_id);
            $insertOrder->order_id = $full_order_id;

            $insertOrder->store_id = $this->store_id;
            $insertOrder->store_name = strtolower(Store::where('store_id', $this->store_id)
                                                       ->first()->store_name);

            $order_date = $order->CreationTime;
            $insertOrder->order_date = date('Y-m-d H:i:s', strtotime($order_date));
            $insertOrder->order_numeric_time = strtotime($order_date);

            #$StatusID = $order->StatusList->OrderStatus->StatusID;
            $tracking_number = $order->CartShipmentInfo->TrackingNumber;
            $insertOrder->tracking_number = $tracking_number;
            #$Shipper = $order->CartShipmentInfo->Shipper;
            $ship_state = $order->CartShipmentInfo->ShipState;
            $insertOrder->ship_state = $ship_state;
            $shipping_method = $order->ShipMethod;

            $customer = new Customer();
            $customer->order_id = $full_order_id;

            $customer->ship_first_name = $order->ShipToInfo->GeneralInfo->FirstName;
            $customer->ship_last_name = $order->ShipToInfo->GeneralInfo->LastName;
            $customer->ship_company_name = $order->ShipToInfo->GeneralInfo->Company;
            $customer->ship_address_1 = $order->ShipToInfo->AddressInfo->Address1;
            $customer->ship_address_2 = $order->ShipToInfo->AddressInfo->Address2;
            $customer->ship_city = $order->ShipToInfo->AddressInfo->City;
            $customer->ship_state = $order->ShipToInfo->AddressInfo->State;
            $customer->ship_zip = $order->ShipToInfo->AddressInfo->Zip;
            $customer->ship_country = $order->ShipToInfo->AddressInfo->Country;
            $customer->ship_phone = $order->ShipToInfo->GeneralInfo->PhoneNumber;
            $customer->ship_email = $order->ShipToInfo->GeneralInfo->Email;
            $customer->shipping = $shipping_method;

            $customer->bill_first_name = $order->BillToInfo->GeneralInfo->FirstName;
            $customer->bill_last_name = $order->BillToInfo->GeneralInfo->LastName;
            $customer->bill_company_name = $order->BillToInfo->GeneralInfo->Company;
            $customer->bill_address_1 = $order->BillToInfo->GeneralInfo->Address1;
            $customer->bill_address_2 = $order->BillToInfo->GeneralInfo->Address2;
            $customer->bill_city = $order->BillToInfo->AddressInfo->City;
            $customer->bill_state = $order->BillToInfo->AddressInfo->State;
            $customer->bill_zip = $order->BillToInfo->AddressInfo->Zip;
            $customer->bill_country = $order->BillToInfo->AddressInfo->Country;
            $customer->bill_phone = $order->BillToInfo->GeneralInfo->PhoneNumber;
            $customer->bill_email = $order->BillToInfo->GeneralInfo->Email;
            $customer->bill_mailing_list = $order->CustomFieldsList->CustomField->Value;
            $customer->save();
            // $BuyerEmail = $order->BuyerEmail;
            // new field didn't find any perfect position

            $item_count = $order->ItemList->Item->count();
            $insertOrder->item_count = $item_count;
            for ( $x = 0; $x < $item_count; $x++ ) {
                $model = $order->ItemList->Item[$x]->ItemCode;

                $product = Product::where('model', $model)
                                  ->first();
                if ( !$product ) {
                    $product = new Product();
                    $product->model = $model;
                }
                $item = new Item();
                $item->order_id = $full_order_id;
                $item->item_code = $model;

                $product_name = $order->ItemList->Item[$x]->Description;
                $item->item_description = $product_name;

                # $LineNumber = $order->ItemList->Item[$x]->LineNumber;
                $item_id = $order->ItemList->Item[$x]->ItemID;
                $idCatalog = $item_id;
                $item->item_id = $item_id;

                $item_options = "";
                $item_option_count = $order->ItemList->Item[$x]->SelectedOptionList->Option->count();
                for ( $y = 0; $y < $item_option_count; $y++ ) {
                    $item_options .= $order->ItemList->Item[$x]->SelectedOptionList->Option[$y]->Name;
                    $item_options .= " = ";
                    $item_options .= $order->ItemList->Item[$x]->SelectedOptionList->Option[$y]->Value;
                    $item_options .= "<br>";
                }
                $item->item_option = $item_options;

                $item_quantity = $order->ItemList->Item[$x]->Quantity;
                $item->item_quantity = $item_quantity;

                preg_match("~.*src\s*=\s*(\"|\'|)?(.*)\s?\\1.*~im", $order->ItemList->Item[$x]->ThumbnailURL, $matches);
                $item_thumb = trim($matches[2], ">");
                $item->item_thumb = $item_thumb;

                $item_unit_price = $order->ItemList->Item[$x]->UnitPrice;
                $item->item_unit_price = $item_unit_price;

                $item_name = $product_name;

                $item_url = $order->ItemList->Item[$x]->URL;
                $item->item_url = $item_url;

                $item_taxable = $order->ItemList->Item[$x]->Taxable;
                $item->item_taxable = ( $item_taxable == 'true' ? 'Yes' : 'No' );

                $item->save();

                $product->storeId = $this->store_id;
                $product->idCatalog = $idCatalog;
                $product->product_url = $item_url;
                $product->product_name = $item_name;
                $product->price = $item_unit_price;
                $product->taxable = ( $item_taxable == 'true' ? 'Yes' : 'No' );
                $product->inset_url = $item_thumb;

                $product->save();
            }
            $sub_total = $order->OrderTotals->Subtotal;

            $shipping = $order->OrderTotals->Shipping;
            $insertOrder->shipping_charge = $shipping;

            $tax = $order->OrderTotals->Tax;
            $insertOrder->tax_charge = $tax;

            $coupon_value = $order->OrderTotals->Coupon;
            $insertOrder->coupon_value = $coupon_value;

            $order_total = $order->OrderTotals->Total;
            $insertOrder->total = $order_total;

            $Referer = $order->Referer;
            $MerchantNotes = $order->MerchantNotes;
            $EntryPoint = $order->EntryPoint;

            $order_comment = $order->BuyerComments;
            $insertOrder->order_comments = $order_comment;

            $Currency = $order->Currency;
            $payment_method = $order->PaymentProcessor;

            $credit_card_type = $order->PaymentType;
            $insertOrder->card_name = $credit_card_type;


            $LastUpdatedTime = $order->LastUpdatedTime;

            $ip_address = $order->BuyerIP;
            $insertOrder->order_ip = $ip_address;

            $Vwoidc = $order->Vwoidc;
            $card_auth = "";
            foreach ( $order->CardEvents[0]->CardAuth[0]->children() as $a ) {
                $card_auth .= $a->getName() . " = " . $a . ", ";
            }
            $card_event = "";
            foreach ( $order->CardEvents[0]->CardEvent[0]->children() as $event ) {
                switch ( $event ) {
                    case $event->getName() == 'PaypalTxId':
                        $insertOrder->paypal_txid = $event->getName();
                        break;
                    default:
                        break;
                }
                $card_event .= $a->getName() . " = " . $a . ", ";
            }
            $insertOrder->order_status = 4;
            $insertOrder->save();
        }

        return true;
    }
}
