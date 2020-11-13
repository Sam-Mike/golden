<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Http\Resources\ClientResource;


class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ['clients' => ClientResource::collection(Client::all())];
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
            'clientName' => 'required',
            'clientAddress' => 'required',
            'clientPhoneNumber' => 'required'
        ]);

        $client = new Client();

        $client->name = request('clientName');
        $client->address = request('clientAddress');
        $client->phone = request('clientPhoneNumber');
        $client->contact_person_name = request('clientContactPersonName');
        $client->mobile = request('clientMobile');
        $client->email = request('clientEmail');
        $client->save();
        return response()->json(['success'], 200);
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
        $client = Client::findOrFail($id);
        $client->name = request('clientName');
        $client->address = request('clientAddress');
        $client->phone = request('clientPhoneNumber');
        $client->contact_person_name = request('clientContactPersonName');
        $client->mobile = request('clientMobile');
        $client->email = request('clientEmail');
        $client->save();
        return response()->json([
            "Client updated Successfully"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Client:: findOrFail($id);
        $client-> delete();
        return response()->json([
            "user deleted successfully"
        ]);

    }
}
