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
        return $this->hasMany('App\Models\People');
    }
    public function department()
    {
        return $this->belongsTo('App\Models\Department');
    }
}
