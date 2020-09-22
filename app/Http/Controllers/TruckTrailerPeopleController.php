<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TruckTrailerPeople;
use App\Models\Trucks;
use App\Models\Trailers;
use App\Models\People;
use App\Models\Clients;
use App\Models\Cargo;
use App\Models\Location;

class TruckTrailerPeopleController extends Controller
{
    public function index()
    {
        $truck_trailer_people=TruckTrailerPeople::all();
        $trucks= Trucks::all();
        $people=People::all();
        $trailers=Trailers::all();
        $clients=Clients::all();
        $cargo=Cargo::all();
        $location=Location::all();
        return view('/truck_trailer_people.truck_trailer_people', compact('truck_trailer_people', 'trucks', 'trailers', 'people', 'clients', 'cargo', 'location'));
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