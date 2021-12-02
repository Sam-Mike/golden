<?php

namespace App\Http\Controllers;

use App\Http\Resources\AllocationResource;
use Illuminate\Http\Request;
use App\Models\Allocation;
use App\Models\People;
use App\Models\Truck;
use App\Models\Vehicle;
use App\Models\Trailer;
use App\Models\Client;
use App\Models\Company;
use App\Models\Cargo;
use App\Models\CargoType;
use App\Models\HazardClass;
use App\Models\Location;
use App\Models\TripClass;
use App\Http\Resources\PeopleResource;
use App\Http\Resources\TruckResource;
use App\Http\Resources\VehicleResource;
use App\Http\Resources\TrailerResource;
use App\Http\Resources\CompanyResource;
use App\Http\Resources\ClientResource;
use App\Http\Resources\CargoResource;
use App\Http\Resources\CargoTypeResource;
use App\Http\Resources\HazardClassResource;
use App\Http\Resources\LocationResource;
use App\Http\Resources\TripClassResource;

class AllocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return [
            "allocations" => AllocationResource::collection(Allocation::all()),
            "vehicles" => VehicleResource::collection(Vehicle::all()),
            "trailers" => TrailerResource::collection(Trailer::all()),
            "drivers" => PeopleResource::collection(People::where('department_role_id', 7)->get()),
            "clients" => ClientResource::collection(Client::all()),
            "company" => CompanyResource::collection(Company::all()),
            "cargo" => CargoResource::collection(Cargo::all()),
            "cargoType" => CargoTypeResource::collection(CargoType::all()),
            "hazardClass" => HazardClassResource::collection(HazardClass::all()),
            "locations" => LocationResource::collection(Location::all()),
            "tripClass" =>  TripClassResource::collection(TripClass::all()),
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
        $request->validate([
            'vehicleId' => 'required',
            'trailerId' => 'required',
            'driverId' => 'required',
        ]);

        $allocation = new Allocation;
        $allocation->vehicle_id = $request->input('vehicleId');
        $allocation->trailer_id = $request->input('trailerId');
        $allocation->driver_id = $request->input('driverId');
        $allocation->activity_status_id = 1;
        $allocation->save();

        //changing vehicle, trailer and driver activity status to ALLOCATED
        $vehicle = Vehicle::find($allocation->vehicle_id);
        $vehicle->activity_status_id = 2;
        $vehicle->save();

        $trailer = Trailer::find($allocation->trailer_id);
        $trailer->activity_status_id = 2;
        $trailer->save();

        $driver = People::find($allocation->driver_id);
        $driver->activity_status_id = 2;
        $driver->save();

        return response()->json(['allocation created successfully']);
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
        //getting the allocation
        $allocation = Allocation::findOrFail($id);

        //changing vehicle, trailer and driver activity status to FREE
        $vehicle = Vehicle::find($allocation->vehicle_id);
        $vehicle->activity_status_id = 1;
        $vehicle->save();

        $trailer = Trailer::find($allocation->trailer_id);
        $trailer->activity_status_id = 1;
        $trailer->save();

        $driver = People::find($allocation->driver_id);
        $driver->activity_status_id = 1;
        $driver->save();

        //deleting the allocation
        $allocation->delete();

        return response()->json(['allocation deleted successfully']);
    }
}
