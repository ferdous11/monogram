<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Status;

class Order extends Model
{
    public function customer ()
    {
        return $this->belongsTo('App\Customer', 'customer_id', 'customer_id');
    }

    public function scopeStoreId ($query, $store_id)
    {
        if ( $store_id == 'all' ) {
            return;
        }
        $query->where('store_id', $store_id);
    }

    public function scopeShippingMethod ($query, $shipping_method)
    {
        if ( $shipping_method == 'all' ) {
            return;
        }
        $query->where('shipping_method', $shipping_method);
    }

    public function scopeStatus ($query, $status)
    {
        if ( $status == 'all' ) {
            return;
        }
        $query->where('order_status', Status::where('status_code', $status)->first()->status_name);
    }

    public function scopeSearch ($query, $search_for, $search_in)
    {
        if(!$search_for){
            return;
        }
        $values = explode(",", str_replace(" ", "", $search_for));
        if($search_in == 'order'){
            $query->where('order_id', 'REGEXP', implode("|", $values));
        } else{
            return;
        }
    }
}
