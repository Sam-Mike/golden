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
        'incident_assess_agent',
        'insident_assess_company',
        'insident_assess_date',
        'insident_assess_document',
        'insident_assess_comment',
        'discharge_voucher_document',
        'discharge_voucher_comment',
        'payment_date',
        'payment_document',
        'payment_comment',
        'claim_status',
    ];
    public function claim_type(){
        return $this->belongsTo(ClaimType::class);
    }
}
