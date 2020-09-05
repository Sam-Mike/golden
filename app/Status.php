<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table='Status';
    public function trucks(){
        $this->hasMany('App\Trucks');
    }
}
