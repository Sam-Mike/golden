<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $table = 'company';

    public function people()
    {
        return $this->hasMany(People::class);
    }
    public function vehicles()
    {
        return $this->hasMany(Vehicle::class);
    }
    public function trailers()
    {
        return $this->hasMany(Trailer::class);
    }
}
