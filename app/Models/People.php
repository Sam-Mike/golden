<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    protected $table='people';

    public function company(){
        return $this->belongsTo('App\Models\Company');
    }

    public function departments(){
        return $this->belongsTo('App\Models\Departments', 'department_id', 'id');
    }

    public function license_classes(){
        return $this->belongsTo('App\Models\LicenseClasses');
    }
    public function truck_trailer_driver(){
        return $this->hasMany('App\Models\TruckTrailerDriver');
    }
}