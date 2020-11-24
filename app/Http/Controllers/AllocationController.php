<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Allocation;
use App\Models\TruckTrailerDriver;
use App\Http\Resources\AllocationResource;



class AllocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ['allocations' => AllocationResource::collection(Allocation::all())];
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
            'truckTrailerDriverList' => 'required'
        ]);
        $ttds = request('truckTrailerDriverList');

        foreach ($ttds as $ttd) {
            $allocation = new Allocation();
            $allocation->client_id = request('clientId');
            $allocation->cargo_id = request('cargoId');
            $allocation->destination_id = request('destinationId');
            $allocation->truck_trailer_driver_id = $ttd;
            $allocation->save();

            //setting ttp to allocated
            $truck_trailer_driver = TruckTrailerDriver::find($ttd);
            $truck_trailer_driver->activity_status_id = 2;
            $truck_trailer_driver->save();
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
        // SET RESOURCE TO ARCHIVE WHEN TRIP ENDS
    }
}
