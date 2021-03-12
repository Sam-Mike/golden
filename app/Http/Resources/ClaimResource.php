<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClaimResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=> $this->id,
            'claimType'=> new ClaimTypeResource($this->claim_type),
            'claimSubject'=>$this->claim_subject,
            'claimSubjectOwner'=>$this->claim_subject_owner,
            'claimDocument'=>$this->claim_document,
            'incidentAssessorName'=>$this->insident_assessor_name,
            'incidentAssessorCompany'=>$this->insident_assessor_company,
            'incidentAssessorDate'=>$this->insident_assessor_date,
            'incidentAssessorComment'=>$this->insident_assessor_comment,
            'incidentAssessorDocument'=>$this->insident_assessor_document,
            'dischargeVoucher'=>$this->discharge_voucher_document,
            'dischargeVoucherComment'=>$this->discharge_voucher_comment,
            'paymentDocument'=>$this->payment_document,
            'claimStatus'=>$this->claim_status,
        ];
    }
}
