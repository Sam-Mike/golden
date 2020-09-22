<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    protected $table='clients';

    public function allocations(){
        return $this->hasMany('App\Models\Allocations');
    }
}