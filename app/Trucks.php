<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trucks extends Model
{
    protected $table='truck';

    public function company(){
        return $this->belongsTo('App\Company');
    }
    public function cluster(){
        return $this->belongsTo('App\Cluster ');
    }
}
