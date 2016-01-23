<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [ '*' ];

    public function batch_route ()
    {
        return $this->hasOne('App\BatchRoute', 'id', 'batch_route_id');
    }

    public function groupedItems ()
    {
        return $this->hasMany('App\Item', 'item_id', 'id_catalog')->whereNull('batch_number')->where('is_deleted', 0)->select(['id', 'item_id', 'order_id']);
    }

    public function scopeSearchIdCatalog ($query, $id_catalog)
    {
        if ( !$id_catalog ) {
            return;
        }
        $replaced = str_replace(" ", "", $id_catalog);
        $values = explode(",", trim($replaced, ","));

        return $query->where('id_catalog', 'REGEXP', implode("|", $values));
    }

    public function scopeSearchProductModel ($query, $product_model)
    {
        if ( !$product_model ) {
            return;
        }
        $replaced = str_replace(" ", "", $product_model);
        $values = explode(",", trim($replaced, ","));

        return $query->where('product_model', 'REGEXP', implode("|", $values));
    }

    public function scopeSearchProductName ($query, $product_name)
    {
        if ( !$product_name ) {
            return;
        }

        return $query->where('product_name', 'LIKE', sprintf("%%%s%%", $product_name));
    }
}
