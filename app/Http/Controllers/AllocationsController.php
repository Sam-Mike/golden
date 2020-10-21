<?php

namespace App\Http\Controllers;

use App\Models\Allocations;
use App\Models\People;
use App\Models\TruckTrailerPeople;
use App\Models\Cargo;
use App\Models\Location;
use App\Models\Clients;
use Illuminate\Http\Request;

class AllocationsController extends Controller
{

    public function setAllocation(Request $request)
    {
        //receiving data from the api

        $trips = $request->checked_truck_trailer_drivers;

        foreach ($trips as $trip) {
            $allocations = new Allocations();

            $allocations->client_id = $request->selected_client;
            $allocations->cargo_id = $request->selecte_cargo;
            $allocations->destination_id = $request->selected_destination;
            $allocations->manifest_no = $request->manifest_no;
            //$allocations->truck_trailer_driver_id = $truck;

            $allocations->save();
        }
        return response()->json([
            'success'
        ], 200);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allocations = Allocations::with(['truck_trailer_people.trucks', 'truck_trailer_people.trailers', 'truck_trailer_people.people', 'cargo', 'clients', 'location',])->get();
        return response()->json([
            'allocations' => $allocations
        ]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Allocations  $allocations
     * @return \Illuminate\Http\Response
     */
    public function show(Allocations $allocations)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Allocations  $allocations
     * @return \Illuminate\Http\Response
     */
    public function edit(Allocations $allocations)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Allocations  $allocations
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Allocations $allocations)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Allocations  $allocations
     * @return \Illuminate\Http\Response
     */
    public function destroy(Allocations $allocations)
    {
        //
    }
}
