<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departments extends Model
{
    protected $table='departments';

    public function people(){
        return $this->hasMany('App\Models\People');
    }

    public function role_position(){
        return $this->hasMany('App\RolePosition');
    }
}
