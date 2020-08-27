<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TruckType extends Model
{
    protected $table='truck_type';
    public function trucks(){
        return $this->hasMany('App\Trucks');
    }
}
