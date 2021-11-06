<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;
    protected $table = 'vehicle';
    protected $fillable = [
        'registration_number',
        'company_id',
        'cluster_id',
        'vehicle_type_id',
        'activity_status_id',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }
    public function vehicle_type()
    {
        return $this->belongsTo(VehicleType::class, 'vehicle_type_id');
    }
    public function vehicle_transmission_type()
    {
        return $this->belongsTo(VehicleTransmissionType::class, 'vehicle_transmission_type_id');
    }
    public function vehicle_make()
    {
        return $this->belongsTo(VehicleMake::class, 'vehicle_make_id');
    }
    public function status()
    {
        return $this->belongsTo(Status::class, 'activity_status_id');
    }
    public function allocations()
    {
        return $this->hasMany(Allocation::class,);
    }
    public function trips()
    {
        return $this->hasManyThrough(Trip::class, Allocation::class, 'vehicle_id', 'allocation_id');
    }

}
