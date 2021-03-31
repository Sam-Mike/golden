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
            "dispatcher" => PeopleResource::collection(People::where('role_position_id', '=', '1')->get())
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
            $trip = new Trip;
            $trip->client_id = $request->input('clientId');
            $trip->cargo_id = $request->input('cargoId');
            $trip->destination_id = $request->input('destinationId');
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
        $trip->activity_status_id = $request->input('activityStatusId');
        $trip->trip_class_id = $request->input('tripClassId');
        $trip->dispatch_date = $request->input('dispatchDate');
        $trip->eta_site = $request->input('etaSite');
        $trip->route_code = $request->input('routeCode');
        $trip->current_location = $request->input('currentLocation');
        $trip->manifest_number = $request->input('manifestNumber');
        $trip->manifest_date = $request->input('manifestDate');
        if ($request->hasFile('manifestDocument')) {
            $trip->manifest_document = $request->file('manifestDocument')->store('manifestDocuments');
            $trip->activity_status_id = 5;
        }
        $trip->manifest_document = $request->input('manifestDocument');
        $trip->file_number = $request->input('fileNumber');
        $trip->cargo_order_number = $request->input('cargoOrderNumber');
        $trip->cargo_weight = $request->input('cargoWeight');
        $trip->cargo_quantity = $request->input('cargoQuantity');
        $trip->seal_number = $request->input('sealNumber');
        $trip->container_number = $request->input('containerNumber');
        $trip->loading_date = $request->input('loadingDate');
        $trip->loading_location_id = $request->input('loadingLocation');
        $trip->save();

        //setting truck, trailer and driver free in case the trip ends
        $allocation = Allocation::find($trip->allocation_id);

        $truck = Truck::find($allocation->truck_id);
        $truck->activity_status_id = $request->input('truckActivityStatusId');
        $truck->save();

        $trailer = Trailer::find($allocation->trailer_id);
        $trailer->activity_status_id = $request->input('trailerActivityStatusId');
        $trailer->save();

        $driver = People::find($allocation->driver_id);
        $driver->activity_status_id = $request->input('driverActivityStatusId');
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
    public function destroy(Request $request, $id)
    {
        //
    }
}
