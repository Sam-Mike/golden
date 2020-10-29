<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TrucksResource extends JsonResource
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
            'registrationNumber' =>$this->reg_number,
            'company'=> new CompanyResource($this->company),
            'cluster'=>new ClusterResource($this->cluster),
            'truckType'=>new TruckTypeResource($this->truck_type),
            'allocationStatus'=>new StatusResource($this->status),
        ];

    }
}
