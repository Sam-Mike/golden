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
            'truck' => new TruckResource($this->truck),
            'trailer' => new TrailerResource($this->trailer),
            'driver' => new PeopleResource($this->driver),
            'activityStatus' => new StatusResource($this->status),
        ];
    }
}
