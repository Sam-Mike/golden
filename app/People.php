<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    protected $table='people';

    public function company(){
        return $this->belongsTo('App\Company');
    }

    public function departments(){
        return $this->belongsTo('App\Departments', 'department_id', 'id');
    }

    public function license_classes(){
        return $this->belongsTo('App\LicenseClasses');
    }
}