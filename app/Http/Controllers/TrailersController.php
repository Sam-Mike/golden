<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trailers;
use App\Models\TrailerType;
use App\Models\Company;

class TrailersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trailers=Trailers:: with([ 'company', 'trailer_type'])->get();
        $trailer_type= TrailerType::all();
        $company= Company::all();
        return response()->json([
            'trailers'=>$trailers,
            'trailer_type'=>$trailer_type,
            'company'=>$company
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
        $trailer = new Trailers();
        $trailer->tl_number = request('tl_number');
        $trailer->reg_number = request('reg_number');
        $trailer->trailer_type_id = request('trailer_type');
        $trailer->company_id = request('company_name');

        $trailer->save();
        return response()->json([
            'success'
        ], 200);    }

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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
