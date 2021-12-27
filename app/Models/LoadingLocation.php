<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoadingLocation extends Model
{
    use HasFactory;
    protected $table = "loading_location";
    public function trips()
    {
        $this->hasMany(Trip::class);
    }
}
