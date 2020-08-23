<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cluster extends Model
{
    protected $table='cluster';

    public function trucks(){
        $this->hasMany('App\Trucks');
    }
}
