<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Allocation extends Model
{
    use HasFactory;

    protected $table = "allocation";

    public function truck()
    {
        return $this->belongsTo(Truck::class, 'truck_id', 'id');
    }
    public function trailer()
    {
        return $this->belongsTo(Trailer::class, 'trailer_id', 'id');
    }
    public function driver()
    {
        return $this->belongsTo(People::class, 'driver_id');
    }
    public function status()
    {
        return $this->belongsTo(Status::class, 'activity_status_id');
    }
    public function trips()
    {
        return $this->hasMany(Trip::class);
    }
}
