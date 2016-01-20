<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BatchRoute extends Model
{
    public function stations ()
    {
        return $this->belongsToMany('App\Station', 'batch_route_station', 'batch_route_id', 'station_id')
                    ->withTimestamps();
    }

    public function stations_list(){
        return $this->belongsToMany('App\Station')->select('station_name');
    }
}
