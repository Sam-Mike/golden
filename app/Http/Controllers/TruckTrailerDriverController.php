<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TruckTrailerDriver;
use App\Models\Trucks;
use App\Models\Trailers;
use App\Models\People;
use App\Models\Clients;
use App\Models\Cargo;
use App\Models\Company;
use App\Models\Location;

class TruckTrailerDriverController extends Controller
{
    public function index()
    {
        $truck_trailer_driver = TruckTrailerDriver::with (['trucks', 'trucks.company', 'trucks.cluster', 'trucks.truck_type', 'trailers','people'])->get();
        $company = Company:: all();
        $clients = Clients:: all();
        $cargo = Cargo::all();
        $locations = Location:: all();
        $trucks = Trucks:: with(['company'])->get();
        $trailers = Trailers:: all();
        $people = People:: all();
        return response()->json([
            'truck_trailer_driver'=>$truck_trailer_driver,
            'company'=>$company,
            'clients'=>$clients,
            'cargo'=>$cargo,
            'locations'=>$locations,
            'trucks'=>$trucks,
            'trailers'=>$trailers,
            'people'=>$people,
            ]);
    }

    public function store(Request $request){
        $truck_trailer_driver = new TruckTrailerDriver();

        $truck_trailer_driver->truck_id = request('truckId');
        $truck_trailer_driver->trailer_id = request('trailerId');
        $truck_trailer_driver->driver_id = request('driverId');
        $truck_trailer_driver->save();

        $truck = Trucks::find($truck_trailer_driver->truck_id);
        $truck->allocation_status_id = 2;
        $truck->save();
        return  response()->json([
            'success'
        ], 200);
    }
}
