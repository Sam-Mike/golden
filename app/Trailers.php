<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trailers extends Model
{
    protected $table='trailer';

    public function truck_trailer_people(){
        return $this->hasMany('App\TruckTrailerPeople');
    }
}
