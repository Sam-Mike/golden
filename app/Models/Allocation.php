<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Allocation extends Model
{
    use HasFactory;

    protected $table = "allocation";

    public function trucks()
    {
        return $this->belongsTo('App\Models\Truck', 'truck_id', 'id');
    }
    public function trailers()
    {
        return $this->belongsTo('App\Models\Trailer', 'trailer_id', 'id');
    }
    public function people()
    {
        return $this->belongsTo('App\Models\People', 'driver_id');
    }
    public function status()
    {
        return $this->belongsTo('App\Models\Status', 'activity_status_id');
    }
    public function trips()
    {
        return $this->hasMany('App\Models\Trips');
    }
}
