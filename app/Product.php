<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [ '*' ];
    public static $searchable_fields = [
        'id_catalog'    => 'Catalog',
        'product_model' => 'Model',
        'product_name'  => 'Product name',
    ];

    public function batch_route ()
    {
        return $this->hasOne('App\BatchRoute', 'id', 'batch_route_id');
    }

    public function scopeSearch ($query, $search_in, $search_for)
    {
        if ( !$search_for ) {
            return;
        }

        if ( array_key_exists($search_in, self::$searchable_fields) ) {
            $values = explode(",", str_replace(" ", "", $search_for));
            $query->where($search_in, 'REGEXP', implode("|", $values));
        }

        return;
    }
}
