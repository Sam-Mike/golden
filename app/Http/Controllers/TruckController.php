<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Truck;
use App\Models\TruckType;
use App\Models\VehicleMake;
use App\Models\VehicleTransmissionType;
use App\Models\FuelType;
use App\Models\Company;
use App\Models\Cluster;
use App\Models\Status;
use App\Http\Resources\TruckResource;
use App\Http\Resources\TruckTypeResource;
use App\Http\Resources\VehicleMakeResource;
use App\Http\Resources\VehicleTransmissionTypeResource;
use App\Http\Resources\FuelTypeResource;
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
            'vehicleMake' => VehicleMakeResource::collection(VehicleMake::all()),
            'vehicleTransmissionType' => VehicleTransmissionTypeResource::collection(VehicleTransmissionType::all()),
            'fuelType' => FuelTypeResource::collection(FuelType::all()),
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
        $truck = new Truck;
        $truck->fleet_number = $request->input('fleetNumber');
        $truck->registration_number = $request->input('registrationNumber');
        $truck->make_id = $request->input('makeId');
        $truck->truck_type_id = $request->input('truckTypeId');
        $truck->year_model = $request->input('yearModel');
        $truck->chassis_number = $request->input('chassisNumber');
        $truck->truck_model_configuration = $request->input('truckModelConfiguration');
        $truck->engine_size = $request->input('engineSize');
        $truck->authorized_payload = $request->input('authorizedPayload');
        $truck->length = $request->input('length');
        $truck->width = $request->input('width');
        $truck->height = $request->input('height');
        $truck->fuel_type_id = $request->input('fuelTypeId');
        $truck->fuel_capacity = $request->input('fuelCapacity');
        $truck->fuel_consumption = $request->input('fuelConsumption');
        $truck->transmission_type_id = $request->input('transmissionTypeId');
        $truck->company_id = $request->input('companyId');
        $truck->activity_status_id = 1; //setting assignment status to free on creation
        $truck->save();
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
        $truck = Truck::findOrFail($id);
        $truck->fleet_number = $request->input('fleetNumber');
        $truck->registration_number = $request->input('registrationNumber');
        $truck->make_id = $request->input('makeId');
        $truck->truck_type_id = $request->input('truckTypeId');
        $truck->year_model = $request->input('yearModel');
        $truck->chassis_number = $request->input('chassisNumber');
        $truck->truck_model_configuration = $request->input('truckModelConfiguration');
        $truck->engine_size = $request->input('engineSize');
        $truck->authorized_payload = $request->input('authorizedPayload');
        $truck->length = $request->input('length');
        $truck->width = $request->input('width');
        $truck->height = $request->input('height');
        $truck->fuel_type_id = $request->input('fuelTypeId');
        $truck->fuel_capacity = $request->input('fuelCapacity');
        $truck->fuel_consumption = $request->input('fuelConsumption');
        $truck->transmission_type_id = $request->input('transmissionTypeId');
        $truck->company_id = $request->input('companyId');
        $truck->activity_status_id = $request->input('activityStatusId');
        $truck->save();
        return  response()->json(['success'], 200);
    }
    public function switch_truck_activity(Request $request, $id)
    {
        $truck = Truck::findOrFail($id);
        $truck->activity_status_id = $request->input('activityStatusId');
        $truck->save();
        return response()->json(["Truck updated successfully"], 200);
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
