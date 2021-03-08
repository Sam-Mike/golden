<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TruckType extends Model
{
    use HasFactory;
    protected $table = 'truck_type';

    public function trucks()
    {
        return $this->hasMany(Truck::class);
    }
}
