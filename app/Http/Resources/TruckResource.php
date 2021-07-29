<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TruckResource extends JsonResource
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
            'registrationNumber' => $this->registration_number,
            'make' => new VehicleMakeResource($this->vehicle_make),
            'registrationNumber' => $this->registration_number,
            'registrationNumber' => $this->registration_number,
            'company' => new CompanyResource($this->company),
            'truckType' => new TruckTypeResource($this->truck_type),
            'activityStatus' => new StatusResource($this->status),
        ];
    }
}
