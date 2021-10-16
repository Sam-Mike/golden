<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class PeopleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //$profilePicture = Storage::get($this->profile_picture);
        return [
            'id' => $this->id,
            'employeeNumber' => $this->employee_number,
            'firstName' => $this->first_name,
            'middleName' => $this->middle_name,
            'lastName' => $this->last_name,
            'dob' => $this->dob,
            'age' => date_diff(date_create($this->dob), today(), true)->format('%y years'),
            'mobile' => $this->mobile,
            'profilePicture' => Storage::url($this->profile_picture),
            'startDate' => $this->start_date,
            'serviceTime' => date_diff(date_create($this->start_date), today(), true)->format('%y years, %m months'),
            'company' => new CompanyResource($this->company),
            'departmentRole' => new DepartmentRoleResource($this->department_role),
            'nidaNumber' => $this->nida_number,
            'ssNumber' => $this->ss_number,
            'tinNumber' => $this->tin_number,
            'licenseNumber' => $this->license_number,
            'licenseClasses' => json_decode($this->license_classes),
            'licenseIssueDate' => $this->license_issue_date,
            'licenseExpiryDate' => $this->license_expiry_date,
            'licenseExpiry' => date_diff(date_create($this->license_issue_date), date_create($this->license_expiry_date), true)->format('%y years, %m months'),
            'passportNumber' => $this->passport_number,
            'passportIssueDate' => $this->passport_issue_date,
            'passportExpiryDate' => $this->passport_expiry_date,
            'nextKinName' => $this->next_kin_name,
            'nextKinMobile' => $this->next_kin_mobile,
            'activityStatus' => new StatusResource($this->status),
        ];
    }
}
