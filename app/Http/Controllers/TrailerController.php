<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trailer;
use App\Models\TrailerType;
use App\Models\Company;
use App\Http\Resources\TrailerResource;
use App\Http\Resources\TrailerTypeResource;
use App\Http\Resources\CompanyResource;

class TrailerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return [
            'trailers' => TrailerResource::collection(Trailer::all()),
            'trailerType' => TrailerTypeResource::collection(TrailerType::all()),
            'company' => CompanyResource::collection(Company::all()),
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
        $trailer = new Trailer;
        $trailer->tl_number = request('tlNumber');
        $trailer->registration_number = request('registrationNumber');
        $trailer->trailer_type_id = request('trailerTypeId');
        $trailer->company_id = request('companyId');
        $trailer->activity_status_id = 1; //assignment status is free on creation
        $trailer->save();
        return  response()->json(['success'], 200);
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
        $trailer = Trailer::findOrFail($id);
        $trailer->tl_number = request('tlNumber');
        $trailer->registration_number = request('registrationNumber');
        $trailer->trailer_type_id = request('trailerTypeId');
        $trailer->company_id = request('companyId');
        $trailer->activity_status_id = request('activityStatusId');
        $trailer->save();

        return  response()->json(['success'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $trialer = Trailer::findOrFail($id);
        $trialer->delete();
        return response()->json(["Trailer deleted successfully"]);
    }
}
