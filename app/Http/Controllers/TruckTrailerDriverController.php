<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TruckTrailerDriver;
use App\Models\People;
use App\Models\Truck;
use App\Models\Trailer;
use App\Models\Client;
use App\Models\Company;
use App\Models\Cargo;
use App\Models\Location;
use App\Http\Resources\TruckTrailerDriverResource;
use App\Http\Resources\PeopleResource;
use App\Http\Resources\TruckResource;
use App\Http\Resources\TrailerResource;
use App\Http\Resources\CompanyResource;
use App\Http\Resources\ClientResource;
use App\Http\Resources\CargoResource;
use App\Http\Resources\LocationResource;

class TruckTrailerDriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return[
            'truckTrailerDrivers'=> TruckTrailerDriverResource::collection(TruckTrailerDriver::all()),
            'trucks'=> TruckResource::collection(Truck::all()),
            'people'=> PeopleResource::collection(People::all()),
            'trailers'=> TrailerResource::collection(Trailer::all()),
            'clients'=> ClientResource::collection(Client::all()),
            'company'=> CompanyResource::collection(Company::all()),
            'cargo'=> CargoResource::collection(Cargo::all()),
            'locations'=> LocationResource::collection(Location::all()),
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
        $truck_trailer_driver = new TruckTrailerDriver();
        $truck_trailer_driver->truck_id = request('truckId');
        $truck_trailer_driver->trailer_id = request('trailerId');
        $truck_trailer_driver->driver_id = request('driverId');
        $truck_trailer_driver->assignment_status_id = 1; //assignment is initially free until allocation sent
        $truck_trailer_driver->save();

        //Changing truck assignment status id to ASSIGNED
        $truck = Truck::find($truck_trailer_driver->truck_id);
        $truck->assignment_status_id = 2;
        $truck->save();

        //Changing trailer assignment status id to ASSIGNED
        $trailer = Trailer::find($truck_trailer_driver->trailer_id);
        $trailer->assignment_status_id = 2;
        $trailer->save();

        //Changing people assignment status id to ASSIGNED
        $people = People::find($truck_trailer_driver->driver_id);
        $people->assignment_status_id = 2;
        $people->save();
        return  response()->json([
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
