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
        'assignment_status_id',
    ];

    public function company()
    {
        return $this->belongsTo('App\Models\Company', 'company_id');
    }
    public function cluster()
    {
        return $this->belongsTo('App\Models\Cluster', 'cluster_id');
    }
    public function truck_type()
    {
        return $this->belongsTo('App\Models\TruckType', 'truck_type_id');
    }
    public function status()
    {
        return $this->belongsTo('App\Models\Status', 'activity_status_id');
    }
    public function truck_trailer_people()
    {
        return $this->hasMany('App\Models\TruckTrailerPeople');
    }
}
