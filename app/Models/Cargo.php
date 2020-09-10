<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    protected $table='cargo';

    public function allocations(){
        return $this->hasMany('App\Models\Allocations');
    }
}
