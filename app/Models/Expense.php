<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;
    protected $table = 'expense';
    protected $fillable = [
        'date',
        'expense_subcategory_id',
        'amount_tzs',
        'amount_usd',
        'currency_id',
        'exchange_rate',
        'description',
        'vehicle_id',
        'person_id',
    ];
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
