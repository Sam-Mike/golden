<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolePosition extends Model
{
    use HasFactory;

    protected $table = 'role_position';

    public function people()
    {
        return $this->hasMany(People::class);
    }
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
