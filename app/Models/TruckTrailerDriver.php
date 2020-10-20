<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TruckTrailerDriver extends Model
{
    protected $table='truck_trailer_driver';

    public function trucks(){
        return $this->belongsTo('App\Models\Trucks', 'truck_id', 'id');
    }
    public function trailers(){
        return $this->belongsTo('App\Models\Trailers', 'trailer_id', 'id');
    }
    public function people(){
        return $this->belongsTo('App\Models\People', 'driver_id');
    }
    public function allocations(){
        return $this->hasMany('App\Models\Allocations');
    }
}
