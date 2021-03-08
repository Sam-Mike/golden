<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $table = 'department';

    public function people()
    {
        return $this->hasMany(People::class);
    }

    public function role_positions()
    {
        return $this->hasMany(RolePosition::class);
    }
}
