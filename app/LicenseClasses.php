<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LicenseClasses extends Model
{
    protected $table='license_classes';

    public function people(){
        return $this->hasMany('App\People');
    }
}
