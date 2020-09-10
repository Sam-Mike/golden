<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trucks extends Model
{
    protected $table='trucks';

    public function company(){
        return $this->belongsTo('App\Models\Company');
    }
    public function cluster(){
        return $this->belongsTo('App\Models\Cluster');
    }
    public function truck_type(){
        return $this->belongsTo('App\Models\TruckType');
    }
    public function truck_trailer_people(){
        return $this->hasMany('App\Models\TruckTrailerPeople');
    }
}
