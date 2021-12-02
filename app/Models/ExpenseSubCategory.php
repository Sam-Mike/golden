<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpenseSubCategory extends Model
{
    use HasFactory;
    protected $table = 'expense_subcategory';
    public function expense_category()
    {
        return $this->belongsTo(ExpenseCategory::class);
    }
}
