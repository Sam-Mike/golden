<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cluster extends Model
{
    use HasFactory;

    protected $table = 'cluster';

    public function trucks()
    {
        return $this->hasMany('App\Models\Truck');
    }
}
