<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public function order ()
    {
        return $this->belongsTo('App\Order', 'order_id', 'order_id');
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
