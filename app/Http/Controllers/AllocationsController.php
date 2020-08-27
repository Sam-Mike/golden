<?php

namespace App\Http\Controllers;

use App\Allocations;
use App\People;
use App\TruckTrailerPeople;
use App\Cargo;
use App\Location;
use App\Clients;
use Illuminate\Http\Request;

class AllocationsController extends Controller
{

    public function setAllocation(Request $request){
        //receiving data from the api

        $truckslist = $request->trucksList;

        foreach ($truckslist as $truck){
        $allocations = new Allocations();

        $allocations->client_id = $request->clientId;
        $allocations->cargo_id = $request->cargoId;
        $allocations->destination_id= $request->destinationId;
        $allocations->manifest_no= $request->manifestNo;
        $allocations->truck_trailer_people_id= $truck;

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
        $allocations=Allocations::all();
        $truck_trailer_people=TruckTrailerPeople::all();
        $cargo=Cargo::all();
        $clients=Clients::all();
        $locations=Location::all();
        return view('/allocations.allocations', compact('allocations','truck_trailer_people', 'cargo', 'clients', 'locations',));
 
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
