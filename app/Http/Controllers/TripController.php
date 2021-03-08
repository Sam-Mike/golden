<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trip;
use App\Models\TripClass;
use App\Models\Allocation;
use App\Models\Truck;
use App\Models\Trailer;
use App\Models\People;
use App\Models\Location;
use App\Http\Resources\TripResource;
use App\Http\Resources\LocationResource;
use App\Http\Resources\PeopleResource;
use App\Http\Resources\TripClassResource;

class TripController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return [
            "trips" =>  TripResource::collection(Trip::all()),
            //local, transit, arrchive trips filtering
            "locations" =>  LocationResource::collection(Location::all()),
            "tripClass" =>  TripClassResource::collection(TripClass::all()),
            "dispatcher" => PeopleResource::collection(People::where('role_position_id','=', '1')->get())
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
            'clientId' => 'required',
            'cargoId' => 'required',
            'destinationId' => 'required',
            'allocationsList' => 'required'
        ]);
        $allocations = request("allocationsList");
        foreach ($allocations as $allocation) {
            $trip = new Trip();
            $trip->client_id = request('clientId');
            $trip->cargo_id = request('cargoId');
            $trip->destination_id = request('destinationId');
            $trip->allocation_id = $allocation;
            $trip->activity_status_id = 4; //maybe from api as activityStatusId
            $trip->save();

            //setting allocation to allocated
            $allocation = Allocation::find($allocation);
            $allocation->activity_status_id = 2;
            $allocation->save();
            //when trip ends delete truckTrailerDriver record to free the assigned
        }
        return response()->json([
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
        $trip = Trip::findOrFail($id);
        //$trip->activity_status_id = request('activityStatusId');
        $trip->trip_class_id = request('tripClassId');
        $trip->dispatch_date = request('dispatchDate');
        $trip->eta_site = request('etaSite');
        $trip->route_code = request('routeCode');
        $trip->current_location = request('currentLocation');
        $trip->manifest_number = request('manifestNumber');
        $trip->manifest_date = request('manifestDate');
        $trip->manifest_document = request('manifestDocument');
        $trip->file_number = request('fileNumber');
        $trip->cargo_order_number = request('cargoOrderNumber');
        $trip->cargo_weight = request('cargoWeight');
        $trip->cargo_quantity = request('cargoQuantity');
        $trip->seal_number = request('sealNumber');
        $trip->container_number = request('containerNumber');
        $trip->loading_date = request('loadingDate');
        $trip->loading_location_id = request('loadingLocation');
        $trip->save();

        //setting truck, trailer and driver free in case the trip ends
        $allocation = Allocation::find($trip->allocation_id);
        $truck = Truck::find($allocation->truck_id);
        $truck->activity_status_id = request('truckActivityStatusId');
        $truck->save();

        $trailer = Trailer::find($allocation->trailer_id);
        $trailer->activity_status_id = request('trailerActivityStatusId');
        $trailer->save();

        $driver = People::find($allocation->driver_id);
        $driver->activity_status_id = request('driverActivityStatusId');
        $driver->save();

        return response()->json([
            'success',
        ], 200);
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
