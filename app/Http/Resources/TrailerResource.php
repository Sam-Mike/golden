<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TrailerResource extends JsonResource
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
            'tlNumber' => $this->tl_number,
            'registrationNumber' => $this->registration_number,
            'company' => new CompanyResource($this->company),
            'trailerType' => new TrailerTypeResource($this->trailer_type),
            'assignmentStatus' => new StatusResource($this->status),
        ];
    }
}
