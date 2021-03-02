<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClaimType extends Model
{
    use HasFactory;
    protected $table = 'claim_type';

    public function claim(){
        return $this->hasMany('App\Models\Claim');
    }
}
