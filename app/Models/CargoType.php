<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\FuncCall;

class CargoType extends Model
{
    use HasFactory;
    protected $table = 'cargo_type';
    public function cargo()
    {
        $this->hasMany(Cargo::class);
    }
}
