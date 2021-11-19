<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleTransmissionType extends Model
{
    use HasFactory;
    protected $table = 'vehicle_transmission_type';

    public function vehicles()
    {
        return $this->hasMany(Vehicle::class);
    }
}