<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

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
            'mobile' => $this->mobile,
            'startDate' => $this->start_date,
            'company' => new CompanyResource($this->company),
            'departmentRole' => new DepartmentRoleResource($this->department_role),
            'licenseNumber' => $this->license_number,
            'licenseIssueDate' => $this->license_issue_date,
            'licenseExpiryDate' => $this->license_expiry_date,
            'activityStatus' => new StatusResource($this->status),
        ];
    }
}
