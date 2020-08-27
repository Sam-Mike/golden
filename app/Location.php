<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table='location';

    public function allocations(){
        return $this->hasMany('App\Allocations');
    }
}
