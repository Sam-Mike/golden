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
        return $this->hasMany('App\Models\People');
    }

    public function role_position()
    {
        return $this->hasMany('App\RolePosition');
    }
}
