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
        return $this->hasMany('App\Models\People');
    }
    public function trailers()
    {
        return $this->hasMany('App\Models\Trailer');
    }
}
