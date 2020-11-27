<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AllocationResource extends JsonResource
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
            'truck' => new TruckResource($this->trucks),
            'trailer' => new TrailerResource($this->trailers),
            'driver' => new PeopleResource($this->people),
            'activityStatus' => new StatusResource($this->status),
        ];
    }
}
