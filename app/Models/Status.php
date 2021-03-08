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
        $this->hasMany(Truck::class);
    }
    public function trailers()
    {
        $this->hasMany(Trailer::class);
    }
    public function people()
    {
        $this->hasMany(People::class);
    }
    public function allocations()
    {
        $this->hasMany(Allocation::class);
    }
}
