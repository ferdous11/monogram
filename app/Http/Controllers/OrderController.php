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
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\MessageBag;
use Monogram\ApiClient;

class OrderController extends Controller
{
    private $store_id = '';

    public function index ()
    {
        $orders = Order::where('is_deleted', 0)
                       ->latest()
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
                       ->storeId($request->get('store'))
                       ->status($request->get('status'))
                       ->shipping($request->get('shipping_method'))
                       ->search($request->get('search_for'), $request->get('search_in'))
                       ->groupBy('order_id')
                       ->latest()
                       ->paginate(50, [
                           'order_id',
                           'short_order',
                           'item_count',
                           'order_date',
                           'order_status',
                           'total',
                       ]);
        $statuses = Status::where('is_deleted', 0)
                          ->lists('status_name', 'status_code');
        $statuses->prepend('All', 'all');

        $stores = Store::where('is_deleted', 0)
                       ->lists('store_name', 'store_id');
        $stores->prepend('All', 'all');

        $shipping_methods = Customer::groupBy('shipping')
                                    ->lists('shipping', 'shipping');
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
                       ->status($request->get('status'))
                       ->shipping($request->get('shipping_method'))
                       ->search($request->get('search_for'), $request->get('search_in'))
                       ->groupBy('order_id')
                       ->latest()
                       ->paginate(50, [
                           'order_id',
                           'item_count',
                           'short_order',
                           'order_date',
                           'order_status',
                           'total',
                       ]);
        $statuses = Status::where('is_deleted', 0)
                          ->lists('status_name', 'status_code');
        $statuses->prepend('All', 'all');

        $stores = Store::where('is_deleted', 0)
                       ->lists('store_name', 'store_id');
        $stores->prepend('All', 'all');

        $shipping_methods = Customer::groupBy('shipping')
                                    ->lists('shipping', 'shipping');
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
        $order = Order::with('customer', 'items', 'order_sub_total')
                      ->where('is_deleted', 0)
                      ->where('order_id', $order_id)
                      ->first();
        if ( !$order ) {
            return view('errors.404');
        }

        $statuses = Status::where('is_deleted', 0)
                          ->lists('status_name', 'status_code');

        $shipping_methods = Customer::groupBy('shipping')
                                    ->lists('shipping', 'shipping');

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
        $order_ids = [ ];
        if ( $request->has('order_from') && $request->has('order_to') ) {
            $order_ids = range($request->get('order_from'), $request->get('order_to'));
        } else {
            $order_ids = explode(",", trim(preg_replace('/\s+/', '', $request->get('order_ids')), ","));
        }
        $needed_api = '';
        $store = $request->get('store');
        if ( strpos($store, "yhst") !== false ) {
            $needed_api = 'yahoo';
        }
        try {
            $api_client = new ApiClient($order_ids, $store, $needed_api);
        } catch ( \Exception $exception ) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors(new MessageBag([ 'api_error' => 'Selected store is not valid' ]));
        }
        $responses = [ ];
        $errors = new Collection();
        list( $responses, $errors ) = $api_client->fetch_data();
        $count = count($order_ids);
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

        Session::flash('success', sprintf('%d order(s) are inserted successfully.', (count($responses) - $errors->count()) ));

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
            $previousOrder = Order::where('order_id', $full_order_id)
                                  ->first();
            if ( $previousOrder ) {
                Order::where('order_id', $full_order_id)
                     ->update([ 'is_deleted' => 1 ]);
                Customer::where('order_id', $full_order_id)
                        ->update([ 'is_deleted' => 1 ]);
                Item::where('order_id', $full_order_id)
                    ->update([ 'is_deleted' => 1 ]);
            }
            $insertOrder->short_order = $order_id;
            $insertOrder->store_id = $this->store_id;
            $insertOrder->order_id = $full_order_id;
            $insertOrder->store_name = strtolower(Store::where('store_id', $this->store_id)
                                                       ->first()->store_name);

            $order_date = $order->CreationTime;
            $insertOrder->order_date = date('Y-m-d H:i:s', strtotime($order_date));
            $insertOrder->order_numeric_time = strtotime($order_date);

            $tracking_number = $order->CartShipmentInfo->TrackingNumber;
            #$StatusID = $order->StatusList->OrderStatus->StatusID;
            #$insertOrder->tracking_number = $tracking_number;
            #$Shipper = $order->CartShipmentInfo->Shipper;
            $ship_state = $order->CartShipmentInfo->ShipState;
            $insertOrder->ship_state = $ship_state;
            $shipping_method = empty( $order->ShipMethod ) ? "N/A" : $order->ShipMethod;

            $customer = new Customer();
            $customer->order_id = $full_order_id;

            $ship_first_name = $order->ShipToInfo->GeneralInfo->FirstName;
            $ship_last_name = $order->ShipToInfo->GeneralInfo->LastName;
            $customer->ship_full_name = sprintf("%s %s", $ship_first_name, $ship_last_name);
            $customer->ship_first_name = $ship_first_name;
            $customer->ship_last_name = $ship_last_name;
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

            $bill_first_name = $order->BillToInfo->GeneralInfo->FirstName;
            $bill_last_name = $order->BillToInfo->GeneralInfo->LastName;

            $customer->bill_full_name = sprintf("%s %s", $bill_first_name, $bill_last_name);
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

                $item = new Item();
                $item->order_id = $full_order_id;
                $item->item_code = $model;

                $product_name = $order->ItemList->Item[$x]->Description;
                $item->item_description = $product_name;

                # $LineNumber = $order->ItemList->Item[$x]->LineNumber;
                $item_id = $order->ItemList->Item[$x]->ItemID;
                $idCatalog = $item_id;
                $item->item_id = $item_id;

                #$item_options = "";
                $item_options = [ ];
                #$item_option_count = $order->ItemList->Item[$x]->SelectedOptionList->Option->count();
                $item_option_count = 0;
                if($order->ItemList->Item[$x]->SelectedOptionList->count() && $order->ItemList->Item[$x]->SelectedOptionList->Option->count()){
                    $item_option_count = $order->ItemList->Item[$x]->SelectedOptionList->Option->count();
                }
                for ( $y = 0; $y < $item_option_count; $y++ ) {
                    $option_name = str_replace(" ", "_", $order->ItemList->Item[$x]->SelectedOptionList->Option[$y]->Name);
                    $option_value = strval($order->ItemList->Item[$x]->SelectedOptionList->Option[$y]->Value[0]);
                    $item_options[$option_name] = $option_value;
                }
                $item->item_option = json_encode($item_options);
                /*if ( count($item_options) ) { // $item_options != ''
                    #$item->item_option = $item_options;
                    $item->item_option = json_encode($item_options);
                }*/

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

                $product = Product::where('id_catalog', $idCatalog)
                                  ->first();
                if ( !$product ) {
                    $product = new Product();
                    $product->id_catalog = $idCatalog;
                }

                $product->store_id = $this->store_id;
                $product->product_model = $model;
                $product->product_url = $item_url;
                $product->product_name = $item_name;
                $product->product_price = $item_unit_price;
                $product->is_taxable = ( $item_taxable == 'true' ? 1 : 0 );
                $product->product_thumb = $item_thumb;

                $product->save();
            }
            $sub_total = $order->OrderTotals->Subtotal;
            $insertOrder->sub_total = $sub_total;

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

            if ( $order->CardEvents->count() != 0 && $order->CardEvents[0]->CardEvent->count() != 0 ) {
                foreach ( $order->CardEvents[0]->CardEvent[0]->children() as $event ) {
                    switch ( $event ) {
                        case $event->getName() == 'PaypalTxId':
                            $insertOrder->paypal_txid = $event;
                            break;
                        default:
                            break;
                    }
                }
            }
            $insertOrder->order_status = 4;
            $insertOrder->save();
        }

        return true;
    }

    public function hook (Request $request)
    {
        $order = new Order();
        try {
            $order->order_id = $request->get('ID');
            $order->item_count = $request->get('Item-Count');
            $order->coupon_description = $request->get('Coupon-Description');
            $order->coupon_id = $request->get('Coupon-Id');
            $order->coupon_value = $request->get('Coupon-Value');
            $order->shipping_charge = $request->get('Shipping-Charge');
            $order->tax_charge = $request->get('Tax-Charge');
            $order->total = $request->get('Total');
            $order->card_name = $request->get('Card-Name');
            $order->card_expiry = $request->get('Card-Expiry');
            $order->order_comments = $request->get('Comments');
            $order->order_date = date('Y-m-d H:i:s', strtotime($request->get('Date')));
            $order->order_numeric_time = $request->get('Numeric-Time');
            $order->order_ip = $request->get('IP');
            $order->paypal_merchant_email = $request->has('PayPal-Merchant-Email') ? $request->get('PayPal-Merchant-Email') : null;
            $order->paypal_txid = $request->has('PayPal-TxID') ? $request->get('PayPal-TxID') : null;
            $order->space_id = $request->get('Space-Id');
            $order->store_id = $request->get('Store-Id');
            $order->store_name = $request->get('Store-Name');
            $order->order_status = 4;
            $order->save();

            $customer = new Customer();
            $customer->order_id = $request->get('ID');
            $customer->bill_full_name = $request->get('Bill-Name');
            $customer->bill_first_name = $request->get('Bill-Firstname');
            $customer->bill_last_name = $request->get('Bill-Lastname');
            $customer->bill_company_name = $request->get('Bill-Company');
            $customer->bill_address_1 = $request->get('Bill-Address1');
            $customer->bill_address_2 = $request->get('Bill-Address2');
            $customer->bill_city = $request->get('Bill-City');
            $customer->bill_state = $request->get('Bill-State');
            $customer->bill_zip = $request->get('Bill-Zip');
            $customer->bill_country = $request->get('Bill-Country');
            $customer->bill_phone = $request->get('Bill-Phone');
            $customer->bill_email = $request->get('Bill-Email');
            $customer->bill_mailing_list = $request->get('Bill-maillist');

            $customer->ship_full_name = $request->get('Ship-Name');
            $customer->ship_first_name = $request->get('Ship-Firstname');
            $customer->ship_last_name = $request->get('Ship-Lastname');
            $customer->ship_company_name = $request->get('Ship-Company');
            $customer->ship_address_1 = $request->get('Ship-Address1');
            $customer->ship_address_2 = $request->get('Ship-Address2');
            $customer->ship_city = $request->get('Ship-City');
            $customer->ship_state = $request->get('Ship-State');
            $customer->ship_zip = $request->get('Ship-Zip');
            $customer->ship_country = $request->get('Ship-Country');
            $customer->ship_phone = $request->get('Ship-Phone');
            $customer->shipping = $request->get('Shipping');
            $customer->save();

            for ( $i = 1; $i <= $request->get('Item-Count'); $i++ ) {
                $item = new Item();

                $itemOptions = '';
                foreach ( $request->all() as $key => $value ) {
                    if ( "Item-Option-" . $i . "-" == substr($key, 0, 14) ) {
                        $itemOptions .= ( str_replace("-", " ", substr($key, 14)) . " = " . $value . "\n" );
                    }
                }

                $item_thumb = $request->get('Item-Thumb-' . $i);
                preg_match("~.*src\s*=\s*(\"|\'|)?(.*)\s?\\1.*~im", $item_thumb, $matches);
                $item_thumb = trim($matches[2], ">");

                $item_code = $request->get('Item-Code-' . $i);
                $item_id = $request->get('Item-Id-' . $i);
                $item_url = $request->get('Item-Url-' . $i);
                $item_name = $request->get('Item-Description-' . $i);
                $item_unit_price = $request->get('Item-Unit-Price-' . $i);
                $item_taxable = ucfirst($request->get('Item-Taxable-' . $i));

                $item->order_id = $request->get('ID');
                $item->item_code = $item_code;
                $item->item_description = $item_name;
                $item->item_id = $item_id;
                $item->item_option = $itemOptions;
                $item->item_quantity = $request->get('Item-Quantity-' . $i);
                $item->item_taxable = $item_taxable;
                $item->item_thumb = $item_thumb;
                $item->item_unit_price = $item_unit_price;
                $item->item_url = $item_url;
                $item->save();

                $product = Product::where('product_model', $item_code)
                                  ->first();
                if ( !$product ) {
                    $product = new Product();
                    $product->product_model = $item_code;
                }

                $product->storeId = $request->get('Store-Id');
                $product->idCatalog = $item_id;
                $product->product_url = $item_url;
                $product->product_name = $item_name;
                $product->price = $item_unit_price;
                $product->taxable = $item_taxable;
                $product->inset_url = $item_thumb;
                $product->save();
            }

        } catch ( PDOException $e ) {
            return response()->json([
                'error'  => true,
                'reason' => 'Parse error',
            ], 422);
        }

        return response()->json([
            'error'  => false,
            'reason' => 'Successfully entered',
        ], 422);
    }
}
