<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TruckTrailerPeople extends Model
{
    protected $table='truck_trailer_people';

    public function trucks(){
        return $this->belongsTo('App\Trucks', 'truck_id', 'id');
    }
    public function trailer(){
        return $this->belongsTo('App\Trailers', 'trailer_id', 'id');
    }
    public function people(){
        return $this->belongsTo('App\People');
    }
    public function allocations(){
        return $this->hasMany('App\Allocations');
    }
}
