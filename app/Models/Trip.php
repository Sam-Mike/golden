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
    public function allocation()
    {
        return $this->belongsTo('App\Models\Allocation', 'allocation_id', 'id');
    }
    public function status()
    {
        return $this->belongsTo('App\Models\Status', 'activity_status_id');
    }
    public function trip_class()
    {
        return $this->belongsTo('App\Models\TripClass', 'trip_class_id');
    }
    public function people()
    {
        return $this->belongsTo('App\Models\TripClass', 'dispatcher_id');
    }
}
