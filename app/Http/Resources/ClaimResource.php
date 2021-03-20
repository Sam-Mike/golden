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
            'claimObject'=>$this->claim_object,
            'claimObjectOwner'=>$this->claim_object_owner,
            'claimDocument'=>$this->claim_document,
            'incidentAssessAgent'=>$this->incident_assess_agent,
            'incidentAssessCompany'=>$this->incident_assess_company,
            'incidentAssessDate'=>$this->incident_assess_date,
            'incidentAssessComment'=>$this->incident_assess_comment,
            'incidentAssessDocument'=>$this->incident_assess_document,
            'dischargeVoucherDate'=>$this->discharge_voucher_date,
            'dischargeVoucherDocument'=>$this->discharge_voucher_document,
            'dischargeVoucherComment'=>$this->discharge_voucher_comment,
            'paymentDate'=>$this->payment_date,
            'paymentComment'=>$this->payment_comment,
            'paymentDocument'=>$this->payment_document,
            'claimStatus'=>$this->claim_status,
        ];
    }
}
