<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Allocations extends Model
{
    protected $table='allocations';

    public function clients(){
        $this->belongsTo('App\Clients');
    }
    public function cargo(){
        $this->belongsTo('App\Cargo');
    }
    public function location(){
        return $this->belongsTo('App\Location');
    }
    public function truck_trailer_people(){
        return $this->belongsTo('App\TruckTrailerPeople');
    }
}
