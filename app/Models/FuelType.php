<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FuelType extends Model
{
    use HasFactory;
    protected $table = 'fuel_type';
    public function trucks()
    {
        return $this->hasMany(Trucks::class);
    }
    public function vehicles()
    {
        return $this->hasMany(Vehicle::class);
    }
}