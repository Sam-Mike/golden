<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;
    protected $table = 'currency';
    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }
    public function deposits()
    {
        return $this->hasMany(Deposit::class);
    }
}
