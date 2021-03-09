<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trailer extends Model
{
    use HasFactory;

    protected $table = 'trailer';
    protected $fillable = [
        'tl_number',
        'registration_number',
        'company_id',
        'trailer_type_id',
        'assignment_status_id'
    ];

    public function allocations()
    {
        return $this->hasMany(Allocation::class);
    }
    public function trips()
    {
        return $this->hasManyThrough(Trip::class, Allocation::class, 'trailer_id', 'allocation_id');
    }
    public function trailer_type()
    {
        return $this->belongsTo(TrailerType::class);
    }
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    public function status()
    {
        return $this->belongsTo(Status::class, 'activity_status_id');
    }
}
