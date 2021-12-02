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
            'name' => 'required',
        ]);

        $client = new Client;
        $client->name = $request->input('name');
        $client->address = $request->input('address');
        $client->phone = $request->input('phoneNumber');
        $client->contact_person_name = $request->input('contactPersonName');
        $client->mobile = $request->input('mobile');
        $client->email = $request->input('email');
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
        $client->name = $request->input('name');
        $client->address = $request->input('address');
        $client->phone = $request->input('phoneNumber');
        $client->contact_person_name = $request->input('contactPersonName');
        $client->mobile = $request->input('mobile');
        $client->email = $request->input('email');
        $client->activity_status_id = $request->input('activityStatusId');
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
