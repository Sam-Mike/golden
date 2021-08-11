<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\People;
use App\Models\Company;
use App\Models\DepartmentRole;
use App\Models\Department;
use App\Http\Resources\PeopleResource;
use App\Http\Resources\CompanyResource;
use App\Http\Resources\DepartmentRoleResource;
use App\Http\Resources\DepartmentResource;
use Illuminate\Support\Facades\Storage;

class PeopleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return [
            'people' => PeopleResource::collection(People::all()),
            'company' => CompanyResource::collection(Company::all()),
            'departmentRoles' => DepartmentRoleResource::collection(DepartmentRole::all()),
            'departments' => DepartmentResource::collection(Department::all()),
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
        $people->employee_number = $request->input('employeeNumber');
        $people->first_name = $request->input('firstName');
        $people->middle_name = $request->input('middleName');
        $people->last_name = $request->input('lastName');
        $people->dob = $request->input('dob');
        $people->mobile = $request->input('mobile');
        if ($request->hasFile('profilePicture')) {
            $pictureName = date('Ymd_Hi') . $request->file('profilePicture')->getClientOriginalName();
            $people->profile_picture = $request->file('profilePicture')->storeAs('profilePictures', $pictureName);
        }
        $people->start_date = $request->input('startDate');
        $people->company_id = $request->input('companyId');
        $people->department_role_id = $request->input('departmentRoleId');
        $people->nida_number = $request->input('nidaNumber');
        $people->ss_number = $request->input('ssNumber');
        $people->tin_number = $request->input('tinNumber');
        $people->license_number = $request->input('licenseNumber');
        $people->license_issue_date = $request->input('licenseIssueDate');
        $people->license_expiry_date = $request->input('licenseExpiryDate');
        $people->license_classes = $request->input('licenseClasses');
        $people->passport_number = $request->input('passportNumber');
        $people->passport_issue_date = $request->input('passportIssueDate');
        $people->passport_expiry_date = $request->input('passportExpiryDate');
        $people->activity_status_id = 1; //assignment status is active on creation
        $people->save();
        return  response()->json(['success'], 200);
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
        $people = People::findOrFail($id);
        $people->employee_number = $request->input('employeeNumber');
        $people->first_name = $request->input('firstName');
        $people->middle_name = $request->input('middleName');
        $people->last_name = $request->input('lastName');
        $people->dob = $request->input('dob');
        $people->mobile = $request->input('mobile');
        if ($request->hasFile('profilePicture')) {
            if ($people->profile_picture) {
                //delete existing if a new picture comes in
                Storage::delete($people->profile_picture);
                //then save the new picture
                $pictureName2 = date('Ymd_Hi') . $request->file('profilePicture')->getclientOriginalName();
                $people->profile_picture = $request->file('profilePicture')->storeAs('profilePictures', $pictureName2);
            } else {
                //save fresh picture
                $pictureName3 = date('Ymd_Hi') . $request->file('profilePicture')->getclientOriginalName();
                $people->profile_picture = $request->file('profilePicture')->storeAs('profilePictures', $pictureName3);
            }
        }
        $people->start_date = $request->input('startDate');
        $people->company_id = $request->input('companyId');
        $people->department_role_id = $request->input('departmentRoleId');
        $people->nida_number = $request->input('nidaNumber');
        $people->ss_number = $request->input('ssNumber');
        $people->tin_number = $request->input('tinNumber');
        $people->license_number = $request->input('licenseNumber');
        $people->license_issue_date = $request->input('licenseIssueDate');
        $people->license_expiry_date = $request->input('licenseExpiryDate');
        $people->license_classes = $request->input('licenseClasses');
        $people->passport_number = $request->input('passportNumber');
        $people->passport_issue_date = $request->input('passportIssueDate');
        $people->passport_expiry_date = $request->input('passportExpiryDate');
        $people->activity_status_id = $request->input('activityStatusId');
        $people->save();

        return response()->json(["Person updated successfully"], 200);
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
