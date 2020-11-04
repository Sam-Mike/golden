<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrailerType extends Model
{
    use HasFactory;

    protected $table = 'trailer_type';

    public function trailers()
    {
        return $this->hasMany('App\Models\Trailer');
    }
}
