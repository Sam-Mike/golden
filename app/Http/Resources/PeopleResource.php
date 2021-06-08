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
        return [
            'id' => $this->id,
            'firstName' => $this->first_name,
            'middleName' => $this->middle_name,
            'lastName' => $this->last_name,
            'dob' => $this->dob,
            'age' => date_diff(date_create($this->dob), today(), true)->format('%y years'),
            'mobile' => $this->mobile,
            'profilePicture' => Storage:: url($this->profile_picture),
            'startDate' => $this->start_date,
            'serviceTime' => date_diff(date_create($this->start_date), today(), true)->format('%y years'),
            'company' => new CompanyResource($this->company),
            'departmentRole' => new DepartmentRoleResource($this->department_role),
            'licenseNumber' => $this->license_number,
            'licenseIssueDate' => $this->license_issue_date,
            'licenseClasses' => json_decode($this->license_classes),
            'licenseExpiryDate' => date_diff(date_create($this->license_issue_date), today(), true)->format('%y years, %m months'),
            'activityStatus' => new StatusResource($this->status),
        ];
    }
}
