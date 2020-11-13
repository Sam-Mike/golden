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

    public function truck_trailer_people()
    {
        return $this->hasMany('App\Models\TruckTrailerPeople');
    }
    public function trailer_type()
    {
        return $this->belongsTo('App\Models\TrailerType');
    }
    public function company()
    {
        return $this->belongsTo('App\Models\Company');
    }
    public function status()
    {
        return $this->belongsTo('App\Models\Status', 'assignment_status_id');
    }
}
