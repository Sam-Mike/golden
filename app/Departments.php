<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departments extends Model
{
    protected $table='departments';

    public function people(){
        return $this->hasMany('App\People');
    }

    public function role_position(){
        return $this->hasMany('role_position');
    }
}
