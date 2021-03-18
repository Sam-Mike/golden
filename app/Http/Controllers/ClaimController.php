<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Claim;
use App\Models\Company;
use App\Models\Client;
use App\Models\ClaimType;
use App\Http\Resources\ClaimResource;
use App\Http\Resources\CompanyResource;
use App\Http\Resources\ClientResource;
use App\Http\Resources\ClaimTypeResource;
use GuzzleHttp\Psr7\Message;

class ClaimController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return [
            'claims' => ClaimResource::collection(Claim::all()),
            'company' => CompanyResource::collection(Company::all()),
            'clients' => ClientResource::collection(Client::all()),
            'claimType' => ClaimTypeResource::collection(ClaimType::all()),
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
        $claim->claim_object = $request->input('claimObject');
        $claim->claim_object_owner = $request->input('claimObjectOwner');
        $claim->save();
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
        $claim = Claim::find($id);
        $claim->incident_assess_agent = $request->input('incidentAssessAgent');
        //$claim->save();
        $something = $request->attributes;
        return response( json_encode($something));
        // if ($claim->save()){
        //     return response()->json(['claim is saved']);
        // }else {
        //     return response()->json(['claim failed to save']);
        // }
        //$claim->save();
        // $claim->incident_assess_company = $request->input('incidentAssessCompany');
        // $claim->incident_assess_date = $request->input('incidentAssessDate');
        // $claim->incident_assess_comment = $request->input('incidentAssessComment');
        // $claim->discharge_voucher_date = $request->input('dischargeVoucherDate');
        // $claim->discharge_voucher_comment = $request->input('dischargeVoucherComment');
        // $claim->payment_date = $request->input('paymentDate');
        // $claim->payment_comment = $request->input('paymentComment');
        //uploading files and updating the claim status
        // $request->whenFilled('claimDocument', function ($claim, $request) {
        //     $claim_document_path = $request->file('claimDocument')->store('claimDocuments');
        //     $claim->claim_document = $claim_document_path;
        //     $claim->claim_status = 2;
        // });
        // $request->whenFilled('incidentAssessDocument', function ($claim, $request) {
        //     $incident_assess_document_path = $request->file('incidentAssessDocument')->store('incidentAssessmentDocuments');
        //     $claim->incident_assess_document = $incident_assess_document_path;
        //     $claim->claim_status = 3;
        // });
        // $request->whenFilled('dischargeVoucherDocument', function ($claim, $request) {
        //     $discharge_voucher_path = $request->file('dischargeVoucherDocument')->store('dischargeVouchers');
        //     $claim->discharge_voucher_document = $discharge_voucher_path;
        //     $claim->claim_status = 4;
        // });
        // $request->whenFilled('paymentDocument', function ($claim, $request) {
        //     $payment_document_path = $request->file('paymentDocument')->store('paymentDocuments');
        //     $claim->payment_document = $payment_document_path;
        //     $claim->claim_status = 5;
        // });
        // $request->whenFilled('claimStatus', function ($claim, $request) {
        //     $claim->claim_status = $request->input('claimStatus');
        // });

        //saving claim
        //$claim->save();
        
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
