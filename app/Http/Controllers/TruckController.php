<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Truck;
use App\Models\TruckType;
use App\Models\Company;
use App\Models\Cluster;
use App\Models\Status;
use App\Http\Resources\TruckResource;
use App\Http\Resources\TruckTypeResource;
use App\Http\Resources\CompanyResource;
use App\Http\Resources\ClusterResource;
use App\Http\Resources\StatusResource;

class TruckController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return [
            'trucks' => TruckResource::collection(Truck::all()),
            'truckType' => TruckTypeResource::collection(TruckType::all()),
            'company' => CompanyResource::collection(Company::all()),
            'cluster' => ClusterResource::collection(Cluster::all()),
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
        $truck = new Truck;
        $truck->registration_number = request('registrationNumber');
        $truck->company_id = request('companyId');
        $truck->cluster_id = request('clusterId');
        $truck->truck_type_id = request('truckTypeId');
        $truck->assignment_status_id = 1; //assignment statuss is free on creation

        $truck->save();
        return  response()->json([
            'success'
        ], 200);
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
        //
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
