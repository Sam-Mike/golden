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
        $claim->incident_assess_company = $request->input('incidentAssessCompany');
        $claim->incident_assess_date = $request->input('incidentAssessDate');
        $claim->incident_assess_comment = $request->input('incidentAssessComment');
        $claim->discharge_voucher_date = $request->input('dischargeVoucherDate');
        $claim->discharge_voucher_comment = $request->input('dischargeVoucherComment');
        $claim->payment_date = $request->input('paymentDate');
        $claim->payment_comment = $request->input('paymentComment');

        //uploading files
        if ($request->hasFile('claimDocument')) {
            $claimDocumentName = date('Ymd_Hi') . $request->file('claimDocument')->getClientOriginalName();
            $claim->claim_document = $request->file('claimDocument')->storeAs('claimDocuments', $claimDocumentName);
            $claim->claim_status = 2;
        };
        if ($request->hasFile('incidentAssessDocument')) {
            $assessDocumentName = date('Ymdm_Hi') . $request->file('incidentAssessDocument')->getClientOriginalName();
            $claim->incident_assess_document = $request->file('incidentAssessDocument')->storeAs('incidentAssessmentDocuments', $assessDocumentName);
            $claim->claim_status = 3;
        }
        if ($request->hasFile('dischargeVoucherDocument')) {
            $dischargeVoucherDocumentName = date('Ymdm_Hi') . $request->file('incidentAssessDocument')->getClientOriginalName();
            $claim->discharge_voucher_document = $request->file('dischargeVoucherDocument')->storeAs('dischargeVouchers', $dischargeVoucherDocumentName);
            $claim->claim_status = 4;
        }
        if ($request->hasFile('paymentDocument')) {
            $paymentDocumentName = date('Ymdm_Hi') . $request->file('incidentAssessDocument')->getClientOriginalName();
            $claim->payment_document = $request->file('paymentDocument')->storeAs('paymentDocuments', $paymentDocumentName);
            $claim->claim_status = 5;
        }
        if ($request->has('claimStatus')) {
            $claim->claim_status = $request->input('claimStatus');
        }
        $claim->save();
        return response()->json([
            "message" => "success"
        ]);
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
