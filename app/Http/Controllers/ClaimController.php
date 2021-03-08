<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Claim;
use App\Models\ClaimType;
use App\Http\Resources\ClaimResource;
use App\Http\Resources\ClaimTypeResource;

class ClaimController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return[
            'claims'=> ClaimResource::collection(Claim::all()),
            'claimType'=> ClaimTypeResource::collection(ClaimType::all()),
        ];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $claim = new Claim;
        $claim->claim_type_id = request('claimTypeId');
        $claim->claim_subject = request('claimSubject');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $claim = Claim::findOrFail($id);
        $claim->claim_document = request('claimDocument');
        $claim->claim_document_status = request('claimDocumentStatus');
        $claim->incident_assessor_name = request('incidentAssessorName');
        $claim->incident_assessor_company = request('incidentAssessorCompany');
        $claim->incident_assess_date = request('incidentAssessDate');
        $claim->incident_assess_comment = request('incidentAssessComment');
        $claim->incident_assess_document = request('incidentAssessDocument');
        $claim->assess_status = request('assessStatus');
        $claim->discharge_voucher = request('dischargeVoucherDocument');
        $claim->discharge_voucher_comment = request('dischargeVoucherComment');
        $claim->discharge_voucher_status = request('dischargeVoucherStatus');
        $claim->payment_document = request('paymentDocument');
        $claim->payment_comment = request('paymentComment');
        $claim->payment_status = request('paymentStatus');
        $claim->claim_status = request('claimStatus');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
