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
            'trailerMake' => new TrailerMakeResource($this->trailer_make),
            'yearModel' => $this->year_model,
            'chassisNumber' => $this->chassis_number,
            'length' => $this->length,
            'width' => $this->width,
            'height' => $this->height,
            'maximumWeight' => $this->maximum_weight,
            'trailerType' => new TrailerTypeResource($this->trailer_type),
            'company' => new CompanyResource($this->company),
            'activityStatus' => new StatusResource($this->status),
        ];
    }
}
