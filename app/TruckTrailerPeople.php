<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TruckTrailerPeople extends Model
{
    protected $table='truck_trailer_people';

    public function truck(){
        return $this->belongsTo('App\LicenseClasses');
    }
    public function trailer(){
        return $this->belongsTo('App\Trailers');
    }
    public function people(){
        return $this->belongsTo('App\People');
    }
    public function allocations(){
        return $this->hasMany('App\Allocations');
    }
}
