<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LicenseClass extends Model
{
    use HasFactory;

    protected $table = 'license_class';

    public function people()
    {
        return $this->hasMany('App\Models\People');
    }
}
