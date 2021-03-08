<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TripClass extends Model
{
    use HasFactory;
    protected $table = 'trip_class';

    public function trips()
    {
        return $this->hasMany(Trip::class);
    }
}
