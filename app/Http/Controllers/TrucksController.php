<?php

namespace App\Http\Controllers;

use App\Models\Trucks;
use App\Models\Company;
use App\Models\TruckType;
use App\Models\Cluster;
use App\Models\Status;
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
        $trucks= Trucks:: with(['company', 'truck_type', 'cluster', 'status'])->get();
        $company= Company::all();
        $truck_type= TruckType::all();
        $cluster= Cluster::all();
        return response()->json([
            'trucks'=>$trucks,
            'company'=>$company,
            'truck_type'=>$truck_type,
            'cluster'=>$cluster
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
        $trucks = new Trucks();

        $trucks->reg_number = request('reg_number');
        $trucks->company_id = request('company_id');
        $trucks->cluster_id = request('cluster_id');
        $trucks->truck_type_id = request('truck_type_id');
        $trucks->allocation_status_id = 1;

        $trucks->save();
        return  response()->json([
            'success'
        ], 200);    }

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
