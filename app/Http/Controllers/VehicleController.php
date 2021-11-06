<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\VehicleType;
use App\Models\VehicleMake;
use App\Models\VehicleTransmissionType;
use App\Models\FuelType;
use App\Models\Company;
use App\Models\Cluster;
use App\Models\Status;
use App\Http\Resources\VehicleResource;
use App\Http\Resources\VehicleTypeResource;
use App\Http\Resources\VehicleMakeResource;
use App\Http\Resources\VehicleTransmissionTypeResource;
use App\Http\Resources\FuelTypeResource;
use App\Http\Resources\CompanyResource;
use App\Http\Resources\ClusterResource;
use App\Http\Resources\StatusResource;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return[
            'vehicles' =>VehicleResource::collection(Vehicle::all()),
            'vehicleType' => VehicleTypeResource::collection(VehicleType::all()),
            'vehicleMake' => VehicleMakeResource::collection(VehicleMake::all()),
            'vehicleTransmissionType' => VehicleTransmissionTypeResource::collection(VehicleTransmissionType::all()),
            'fuelType' => FuelTypeResource::collection(FuelType::all()),
            'company' => CompanyResource::collection(Company::all()),
        ];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vehicle = new Vehicle;
        $vehicle->registration_number = $request->input('registrationNumber');
        $vehicle->vehicle_make_id = $request->input('vehicleMakeId');
        $vehicle->vehicle_type_id = $request->input('vehicleTypeId');
        $vehicle->year_model = $request->input('yearModel');
        $vehicle->chassis_number = $request->input('chassisNumber');
        $vehicle->model_configuration = $request->input('modelConfiguration');
        $vehicle->engine_size = $request->input('engineSize');
        $vehicle->authorized_payload = $request->input('authorizedPayload');
        $vehicle->length = $request->input('length');
        $vehicle->width = $request->input('width');
        $vehicle->height = $request->input('height');
        $vehicle->fuel_type_id = $request->input('fuelTypeId');
        $vehicle->fuel_capacity = $request->input('fuelCapacity');
        $vehicle->fuel_consumption = $request->input('fuelConsumption');
        $vehicle->vehicle_transmission_type_id = $request->input('vehicleTransmissionTypeId');
        $vehicle->company_id = $request->input('companyId');
        $vehicle->activity_status_id = 1; //setting assignment status to free on creation
        $vehicle->save();
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
        $vehicle = Vehicle::findOrFail($id);
        $vehicle->registration_number = $request->input('registrationNumber');
        $vehicle->vehicle_make_id = $request->input('vehicleMakeId');
        $vehicle->vehicle_type_id = $request->input('vehicleTypeId');
        $vehicle->year_model = $request->input('yearModel');
        $vehicle->chassis_number = $request->input('chassisNumber');
        $vehicle->model_configuration = $request->input('modelConfiguration');
        $vehicle->engine_size = $request->input('engineSize');
        $vehicle->authorized_payload = $request->input('authorizedPayload');
        $vehicle->length = $request->input('length');
        $vehicle->width = $request->input('width');
        $vehicle->height = $request->input('height');
        $vehicle->fuel_type_id = $request->input('fuelTypeId');
        $vehicle->fuel_capacity = $request->input('fuelCapacity');
        $vehicle->fuel_consumption = $request->input('fuelConsumption');
        $vehicle->vehicle_transmission_type_id = $request->input('vehicleTransmissionTypeId');
        $vehicle->company_id = $request->input('companyId');
        $vehicle->save();
        return  response()->json(['success'], 200);
    }

    public function switch_vehicle_activity(Request $request, $id)
    {
        $vehicle = Vehicle::findOrFail($id);
        $vehicle->activity_status_id = $request->input('activityStatusId');
        $vehicle->save();
        return response()->json(["Vehicle updated successfully"], 200);
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
