<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Truck extends Model
{
    use HasFactory;

    protected $table = 'truck';
    protected $fillable = [
        'registration_number',
        'company_id',
        'cluster_id',
        'truck_type_id',
        'activity_status_id',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }
    public function truck_type()
    {
        return $this->belongsTo(TruckType::class, 'truck_type_id');
    }
    public function vehicle_make()
    {
        return $this->belongsTo(VehicleMake::class, 'make_id');
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
        return $this->hasManyThrough(Trip::class, Allocation::class, 'truck_id', 'allocation_id');
    }
}
