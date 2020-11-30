<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TripResource extends JsonResource
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
            'client' => new ClientResource($this->client),
            'cargo' => new CargoResource($this->cargo),
            'destination' => new LocationResource($this->location),
            'allocation' => new AllocationResource($this->allocation),
            'loadingDate' => $this->loading_date,
            'dispatchDate' => $this->dispatch_date,
            'etaSite' => $this->eta_site,
            'routeCode' => $this->route_code,
            'currentLocation' => $this->current_location,
            'manifestNumber' => $this->manifest_number,
            'fileNumber' => $this->file_number,
            'cargoWeight' => $this->cargo_weight,
            'activityStatus' => new StatusResource($this->status),
        ];
    }
}
