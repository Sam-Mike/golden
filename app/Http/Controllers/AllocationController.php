<?php

namespace App\Http\Controllers;

use App\Http\Resources\AllocationResource;
use Illuminate\Http\Request;
use App\Models\Allocation;
use App\Models\People;
use App\Models\Truck;
use App\Models\Trailer;
use App\Models\Client;
use App\Models\Company;
use App\Models\Cargo;
use App\Models\Location;
use App\Models\TripClass;
use App\Http\Resources\PeopleResource;
use App\Http\Resources\TruckResource;
use App\Http\Resources\TrailerResource;
use App\Http\Resources\CompanyResource;
use App\Http\Resources\ClientResource;
use App\Http\Resources\CargoResource;
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
            "trucks" => TruckResource::collection(Truck::all()),
            "trailers" => TrailerResource::collection(Trailer::all()),
            "drivers" => PeopleResource::collection(People::all()),
            "clients" => ClientResource::collection(Client::all()),
            "company" => CompanyResource::collection(Company::all()),
            "cargo" => CargoResource::collection(Cargo::all()),
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
            'truckId' => 'required',
            'trailerId' => 'required',
            'driverId' => 'required',
        ]);

        $allocation = new Allocation;
        $allocation->truck_id = $request->input('truckId');
        $allocation->trailer_id = $request->input('trailerId');
        $allocation->driver_id = $request->input('driverId');
        $allocation->activity_status_id = 1;
        $allocation->save();

        //changing truck, trailer and driver activity status to ALLOCATED
        $truck = Truck::find($allocation->truck_id);
        $truck->activity_status_id = 2;
        $truck->save();

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

        //changing truck, trailer and driver activity status to FREE
        $truck = Truck::find($allocation->truck_id);
        $truck->activity_status_id = 1;
        $truck->save();

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
