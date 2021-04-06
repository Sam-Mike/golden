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
        return $this->belongsTo(Company::class);
    }
    public function department_role()
    {
        return $this->belongsTo(DepartmentRole::class, 'department_role_id');
    }
    public function license_class()
    {
        return $this->belongsTo(LicenseClass::class);
    }
    public function status()
    {
        return $this->belongsTo(Status::class, 'activity_status_id');
    }
    public function allocations()
    {
        return $this->hasMany(App\Models\Allocation::class);
    }
    public function trips()
    {
        return $this->hasManyThrough(Trip::class, Allocation::class, 'driver_id', 'allocation_id');
    }
}
