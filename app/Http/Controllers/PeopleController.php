<?php

namespace App\Http\Controllers;

use App\Http\Resources\CompanyResource;
use App\Http\Resources\DepartmentResource;
use App\Http\Resources\PeopleResource;
use Illuminate\Http\Request;
use App\Models\Departments;
use App\Models\People;
use App\Models\Company;
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
        //$people = People::with(['company', 'departments', 'license_classes'])->get();
        // $company = Company::all();
        // $departments = Departments::all();
        // $license_classes = LicenseClasses::all();
        return [
            'people'=>PeopleResource::collection(People::all()),
            'company'=>CompanyResource::collection(Company::all()),
            'departments'=>DepartmentResource::collection(Departments::all()),
            //'licenseClass'=>LicenseClasses::collection(Licence::all())
        ];

        // return response()->json([
        //     'people' => $people,
        //     'company' => $company,
        //     'departments' => $departments,
        //     'license_classes' => $license_classes
        // ]);
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
        $people = new People();
        $people->first_name = request('firstName');
        $people->middle_name = request('middleName');
        $people->last_name = request('lastName');
        $people->dob = request('dob');
        $people->mobile = request('mobile');
        $people->start_date = request('startDate');
        $people->company_id = request('companyName');
        $people->department_id = request('departmentName');
        $people->license_number = request('licenseNumber');
        $people->license_issue_date = request('licenseIssueDate');
        $people->license_class_id = request('licenseClass');
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
