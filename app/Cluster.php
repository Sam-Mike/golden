<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cluster extends Model
{
    protected $table='cluster';

    public function trucks(){
        return $this->hasMany('App\Trucks');
    }
}
