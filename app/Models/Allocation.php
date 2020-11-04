<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Allocation extends Model
{
    use HasFactory;

    protected $table = 'allocation';

    public function client()
    {
        return $this->belongsTo('App\Models\Client', 'client_id', 'id');
    }
    public function cargo()
    {
        return $this->belongsTo('App\Models\Cargo', 'cargo_id', 'id');
    }
    public function location()
    {
        return $this->belongsTo('App\Models\Location', 'destination_id', 'id');
    }
    public function truck_trailer_driver()
    {
        return $this->belongsTo('App\Models\TruckTrailerDriver', 'truck_trailer_driver_id', 'id');
    }
}