<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table='company';

    public function people(){
        return $this->hasMany('App\People');
    }
    public function trailers(){
        return $this->hasMany('App\Trailers');
    }
}
