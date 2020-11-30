<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trip;
use App\Models\Allocation;
use App\Http\Resources\TripResource;

class TripController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ["trips" =>  TripResource::collection(Trip::all())];
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
