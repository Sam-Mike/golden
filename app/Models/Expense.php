<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;
    protected $table = 'expense';
    public function expense_subcategory()
    {
        return $this->belongsTo(ExpenseSubCategory::class);
    }
    public function person()
    {
        return $this->belongsTo(People::class);
    }
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }
}
