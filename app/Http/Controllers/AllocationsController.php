<?php

namespace App\Http\Controllers;

use App\Allocations;
use Illuminate\Http\Request;

class AllocationsController extends Controller
{

    public function setAllocation(Request $request){
        //you are recieving the following:
        //1. cargoId
        //2. destinationId
        //3. clientId
        //4. manifestnNo
        //5. trucksList (Array)

        $truckslist = $request->trucksList;

        //handle them and return json response.
        foreach ($truckslist as $truck){
        $allocations = new Allocations();

        $allocations->client_id = $request->clientId;
        $allocations->cargo_id = $request->cargoId;
        $allocations->destination_id= $request->destinationId;
        $allocations->manifest_no= $request->manifestNo;
        $allocations->truck_trailer_id= $truck;

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
        //
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
