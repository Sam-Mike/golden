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
        ]);

        $client = new Client();
        $client->name = $request->input('clientName');
        $client->address = $request->input('clientAddress');
        $client->phone = $request->input('clientPhoneNumber');
        $client->contact_person_name = $request->input('clientContactPersonName');
        $client->mobile = $request->input('clientMobile');
        $client->email = $request->input('clientEmail');
        $client->activity_status_id = 1;
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
        $client->name = $request->input('clientName');
        $client->address = $request->input('clientAddress');
        $client->phone = $request->input('clientPhoneNumber');
        $client->contact_person_name = $request->input('clientContactPersonName');
        $client->mobile = $request->input('clientMobile');
        $client->email = $request->input('clientEmail');
        $client->activity_status_id = $request->input('clientActivityStatusId');
        $client->save();
        return response()->json([
            "Client updated Successfully", 200
        ]);
    }
    public function switch_client_activity(Request $request, $id)
    {
        $client = Client::findOrFail($id);
        $client->activity_status_id = $request->input('activityStatusId');
        $client->save();
        return response()->json(["Client updated successfully"], 200);
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
