<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    use HasFactory;

    protected $table = 'cargo';

    public function allocations()
    {
        return $this->hasMany(Allocation::class);
    }
    public function cargo_type()
    {
        return $this->belongsTo(CargoType::class);
    }
    public function hazard_class()
    {
        return $this->belongsTo(HazardClass::class);
    }
}
