<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public function order ()
    {
        return $this->belongsTo('App\Order', 'order_id', 'order_id')->where('is_deleted', 0)->select(['id', 'order_id', 'item_count', 'order_date', 'short_order', 'store_id']);
    }

    public function product ()
    {
        return $this->belongsTo('App\Product', 'item_id', 'id_catalog')->where('is_deleted', 0);
    }

    public function scopeOrderId ($query, $search_for, $search_in)
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
