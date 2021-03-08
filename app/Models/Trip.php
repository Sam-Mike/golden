<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;
    protected $table = 'trip';
    protected $fillable = [
        'loading_date',
        'dispatch_date',
        'eta_site',
        'route_code',
        'current_location',
        'manifest_number',
        'file_number',
        'cargo_weight'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }
    public function cargo()
    {
        return $this->belongsTo(Cargo::class, 'cargo_id', 'id');
    }
    public function destination()
    {
        return $this->belongsTo(Location::class, 'destination_id', 'id');
    }
    public function loadingLocation()
    {
        return $this->belongsTo(Location::class, 'loading_location_id', 'id');
    }
    public function allocation()
    {
        return $this->belongsTo(Allocation::class, 'allocation_id', 'id');
    }
    public function status()
    {
        return $this->belongsTo(Status::class, 'activity_status_id');
    }
    public function trip_class()
    {
        return $this->belongsTo(TripClass::class, 'trip_class_id');
    }
    public function people()
    {
        return $this->belongsTo(People::class, 'dispatcher_id');
    }
}
