<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    protected $table='cargo';

    public function allocations(){
        return $this->hasMany('App\Allocations');
    }
}
