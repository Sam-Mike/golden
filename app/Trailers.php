<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trailers extends Model
{
    protected $table='trailer';

    public function truck_trailer_people(){
        return $this->hasMany('App\TruckTrailerPeople');
    }
    public function trailer_type(){
        return $this->belongsTo('App\TrailerType');
    }
    public function company(){
        return $this->belongsTo('App\Company');
    }
}
