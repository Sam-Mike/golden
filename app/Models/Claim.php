<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Claim extends Model
{
    use HasFactory;
    protected $table = 'claim';
    protected $fillable = [
        'claim_document',
        'insident_assessor_name',
        'insident_assessor_company',
        'insident_assessor_date',
        'insident_assessor_document',
        'insident_assessor_comment',
        'discharge_voucher_document',
        'discharge_voucher_comment',
        'payment_document',
    ];
    public function claim_type(){
        return $this->belongsTo(ClaimType::class);
    }
}
