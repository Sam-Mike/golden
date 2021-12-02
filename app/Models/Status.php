<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    protected $table = 'status';

    public function trucks()
    {
        return $this->hasMany(Truck::class);
    }
    public function vehicles()
    {
        return $this->hasMany(Vehicle::class);
    }
    public function trailers()
    {
        return $this->hasMany(Trailer::class);
    }
    public function people()
    {
        return $this->hasMany(People::class);
    }
    public function allocations()
    {
        return $this->hasMany(Allocation::class);
    }
}
