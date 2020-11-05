<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\People;
use App\Models\Company;
use App\Models\Department;
use App\Models\LicenseClass;
use App\Http\Resources\PeopleResource;
use App\Http\Resources\CompanyResource;
use App\Http\Resources\DepartmentResource;
use App\Http\Resources\LicenseClassResource;

class PeopleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return[
            'people' => PeopleResource::collection(People::all()),
            'company' => CompanyResource::collection(Company::all()),
            'departments' => DepartmentResource::collection(Department::all()),
            //'licenseClass'=>LicenseClasses::collection(Licence::all())
        ];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $people = new People();
        $people->first_name = request('firstName');
        $people->middle_name = request('middleName');
        $people->last_name = request('lastName');
        $people->dob = request('dob');
        $people->mobile = request('mobile');
        $people->start_date = request('startDate');
        $people->company_id = request('companyId');
        $people->department_id = request('departmentId');
        $people->license_number = request('licenseNumber');
        $people->license_issue_date = request('licenseIssueDate');
        $people->license_class_id = request('licenseClass');
        $people->assignment_status_id = 1; //assignment status is free on creation
        $people->save();
        return  response()->json([
            'success'
        ], 200);
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
