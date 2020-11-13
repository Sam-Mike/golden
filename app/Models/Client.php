<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $table = 'client';
    protected $fillable = ['id', 'name', 'address', 'phone_number', 'contact_person_name', 'mobile', 'email'];

    public function allocations()
    {
        return $this->hasMany('App\Models\Allocation');
    }
}
