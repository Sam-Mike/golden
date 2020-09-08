<?php

namespace App\Http\Controllers;

use App\Trucks;
use App\Company;
use App\TruckType;
use App\Cluster;
use App\Cargo;
use App\Clients;
use App\Location;
use App\Status;
use Illuminate\Http\Request;

class TrucksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trucks= Trucks::all();
        $company=Company::all();
        $truck_type=TruckType::all();
        $cluster=Cluster::all();
        $cargo=Cargo::all();
        $clients=Clients::all();
        $locations=Location::all();
        $status=Status::all();
        return view('/trucks.trucks', compact('trucks', 'company', 'truck_type', 'cluster', 'locations', 'cargo', 'clients', 'status'));
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
        $trucks = new Trucks();

        $trucks->reg_number = request('reg_number');
        $trucks->company_id = request('company_name');
        $trucks->cluster_id = request('cluster_name');
        $trucks->truck_type_id = request('truck_type');

        $trucks->save();
        return redirect('trucks');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Trucks  $trucks
     * @return \Illuminate\Http\Response
     */
    public function show(Trucks $trucks)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Trucks  $trucks
     * @return \Illuminate\Http\Response
     */
    public function edit(Trucks $trucks)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Trucks  $trucks
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Trucks $trucks)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Trucks  $trucks
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trucks $trucks)
    {
        //
    }
}
