<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Allocations extends Model
{
    protected $table='allocations';

    public function clients(){
        return $this->belongsTo('App\Models\Clients', 'client_id', 'id');
    }
    public function cargo(){
        return $this->belongsTo('App\Models\Cargo');
    }
    public function location(){
        return $this->belongsTo('App\Models\Location', 'destination_id', 'id');
    }
    public function truck_trailer_people(){
        return $this->belongsTo('App\Models\TruckTrailerPeople');
    }
}
