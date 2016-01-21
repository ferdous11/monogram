<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Status;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    public function customer ()
    {
        return $this->belongsTo('App\Customer', 'order_id', 'order_id')
                    ->where('is_deleted', 0);
    }

    public function items ()
    {
        return $this->hasMany('App\Item', 'order_id', 'order_id')
                    ->where('is_deleted', 0);
    }

    public function order_sub_total ()
    {
        return $this->hasOne('App\Item', 'order_id', 'order_id')->where('is_deleted', 0)->groupBy('order_id')->select(['order_id', DB::raw('(SUM(item_unit_price * item_quantity)) AS sub_total')]);
    }

    public function scopeStoreId ($query, $store_id)
    {
        if ( $store_id == 'all' || null === $store_id) {
            return;
        }
        $query->where('store_id', $store_id);
    }

    public function scopeShipping ($query, $shipping_method)
    {
        if ( $shipping_method == 'all' || null === $shipping_method ) {
            return;
        }
        $order_ids = Customer::where('shipping', $shipping_method)
                             ->lists('order_id');
        $query->whereIn('order_id', $order_ids);
    }

    public function scopeStatus ($query, $status)
    {
        if ( $status == 'all' || null === $status ) {
            return;
        }
        $query->where('order_status', Status::where('status_code', $status)
                                            ->first()->id);
    }

    public function scopeSearch ($query, $search_for, $search_in)
    {
        if ( !$search_for ) {
            return;
        }
        $values = explode(",", str_replace(" ", "", $search_for));
        if ( $search_in == 'order' ) {
            $query->where('order_id', 'REGEXP', implode("|", $values));
        } else {
            return;
        }
    }
}
