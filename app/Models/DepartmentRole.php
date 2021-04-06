<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepartmentRole extends Model
{
    use HasFactory;
    protected $table = 'department_role';

    public function people()
    {
        return $this->hasMany(App\Models\People::class);
    }
    public function department()
    {
        return $this->belongsTo(App\Models\Department::class, 'department_id');
    }
    
}
