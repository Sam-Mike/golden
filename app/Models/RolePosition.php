<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RolePosition extends Model
{
    protected $table='role_position';

    public function people(){
        return $this->hasMany('App\Models\People');
    }
}
