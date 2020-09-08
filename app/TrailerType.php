<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrailerType extends Model
{
    protected $table='trailer_type';

    public function trailer(){
        return $this->hasMany('App\Trailers');
    }
}
