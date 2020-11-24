<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    use HasFactory;

    protected $table = 'people';
    protected $fillable = [
        'first_name', 'middle_name', 'last_name', 'dob', 'mobile', 'start_date', 'company_id', 'department_id', 'license_number', 'license_issue_date', 'assignment_status_id'
    ];

    public function company()
    {
        return $this->belongsTo('App\Models\Company');
    }

    public function department()
    {
        return $this->belongsTo('App\Models\Department');
    }

    public function license_class()
    {
        return $this->belongsTo('App\Models\LicenseClass');
    }
    public function status()
    {
        return $this->belongsTo('App\Models\Status', 'activity_status_id');
    }
    public function truck_trailer_driver()
    {
        return $this->hasMany('App\Models\TruckTrailerDriver');
    }
}
