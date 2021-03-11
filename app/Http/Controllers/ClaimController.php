<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Claim;
use App\Models\Company;
use App\Models\Clients;
use App\Models\ClaimType;
use App\Http\Resources\ClaimResource;
use App\Http\Resources\CompanyResource;
use App\Http\Resources\ClientResource;
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
            'company'=> CompanyResource::collection(Company::all()),
            'clients'=> ClientResource::collection(Client::all()),
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
        $claim->claim_type_id = $request->input('claimTypeId');
        $claim->claim_subject = $request->input('claimSubject');
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
        $claim->claim_document = $request->input('claimDocument');
        $claim->incident_assessor_name = $request->input('incidentAssessorName');
        $claim->incident_assessor_company = $request->input('incidentAssessorCompany');
        $claim->incident_assess_date = $request->input('incidentAssessDate');
        $claim->incident_assess_comment = $request->input('incidentAssessComment');
        $claim->incident_assess_document = $request->input('incidentAssessDocument');
        $claim->discharge_voucher = $request->input('dischargeVoucherDocument');
        $claim->discharge_voucher_comment = $request->input('dischargeVoucherComment');
        $claim->payment_document = $request->input('paymentDocument');
        $claim->payment_comment = $request->input('paymentComment');
        $claim->claim_status = $request->input('claimStatus');

        //updating the claim status
        $request->whenFilled('claimDocument', function($input){
            $claim->claim_document_status = 2;
        });
        $request->whenFilled('incidentAssessDocument', function($input){
            $claim->assess_status = 2;
        });
        $request->whenFilled('dischargeVoucherDocument', function($input){
            $claim->discharge_voucher_status = 2;
        });
        $request->whenFilled('paymentDocument', function($input){
            $claim->payment_status = 2;
        });

        //saving claim
        $claim->save();
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
