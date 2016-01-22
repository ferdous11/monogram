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
}
