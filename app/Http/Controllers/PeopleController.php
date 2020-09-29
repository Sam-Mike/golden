<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\People;
use App\Models\Company;
use App\Models\Departments;
use App\Models\LicenseClasses;

class PeopleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $people = People:: with(['company', 'departments', 'license_classes'])->get();
        $company = Company::all();
        $departments = Departments::all();
        $license_classes = LicenseClasses::all();
        return response()->json([
            'people'=>$people,
            'company'=>$company,
            'departments'=>$departments,
            'license_classes'=>$license_classes
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
        $people=new People();
        $people->first_name=request('first_name');
        $people->middle_name=request('middle_name');
        $people->last_name=request('last_name');
        $people->dob=request('dob');
        $people->mobile=request('mobile');
        $people->start_date=request('start_date');
        $people->company_id=$request->company_name;
        $people->department_id=$request->department_name;
        $people->license_number=request('license_number');
        $people->license_issue_date=request('license_issue_date');
        $people->license_class_id=$request->license_class;
        $people->save();
        return redirect('people');

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
