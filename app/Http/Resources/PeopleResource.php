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
            'department' => new DepartmentResource($this->department),
            'licenseNumber' => $this->license_number,
            'licenseIssueDate' => $this->license_issue_date,
            'assignmentStatus' => new StatusResource($this->status),
        ];
    }
}
