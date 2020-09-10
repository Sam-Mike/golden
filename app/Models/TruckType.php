<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TruckType extends Model
{
    protected $table='truck_type';
    public function trucks(){
        return $this->hasMany('App\Models\Trucks');
    }
}
