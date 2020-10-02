<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TruckTrailerPeople;
use App\Models\Trucks;
use App\Models\Trailers;
use App\Models\People;
use App\Models\Clients;
use App\Models\Cargo;
use App\Models\Company;
use App\Models\Location;

class TruckTrailerPeopleController extends Controller
{
    public function index()
    {
        $truck_trailer_people = TruckTrailerPeople::with (['trucks', 'trucks.company', 'trucks.cluster', 'trucks.truck_type', 'trailers', 'people'])->get();
        $company = Company:: all();
        $clients = Clients:: all();
        $cargo = Cargo::all();
        $locations = Location:: all();
        $trucks = Trucks:: all();
        $trailers = Trailers:: all();
        $people = People:: all();
        return response()->json([
            'truck_trailer_people'=>$truck_trailer_people,
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
        $truck_trailer_people = new TruckTrailerPeople();

        $truck_trailer_people->truck_id = request('truck');
        $truck_trailer_people->trailer_id = request('trailer');
        $truck_trailer_people->people_id = request('driver');

        $truck_trailer_people->save();
        return redirect('truck_trailer_people');

    }
}
