<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    protected $table = 'status';

    public function trucks()
    {
        $this->hasMany('App\Models\Truck');
    }
    public function trailers()
    {
        $this->hasMany('App\Models\Trailer');
    }
    public function people()
    {
        $this->hasMany('App\Models\People');
    }
    public function truck_trailer_driver()
    {
        $this->hasMany('App\Models\TruckTrailerDriver');
    }
}
