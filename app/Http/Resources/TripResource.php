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
            'destination' => new LocationResource($this->destination),
            'allocation' => new AllocationResource($this->allocation),
            'activityStatus' => new StatusResource($this->status),
            'tripClass' => new TripClassResource($this->trip_class),
            'dispatchDate' => $this->dispatch_date,
            'dispatcher' => new PeopleResource($this->people),
            'etaSite' => $this->eta_site,
            'routeCode' => $this->route_code,
            'currentLocation' => $this->current_location,
            'manifestNumber' => $this->manifest_number,
            'manifestDate' => $this->manifest_date,
            'manifestDocument' => $this->manifest_document,
            'fileNumber' => $this->file_number,
            'cargoOrderNumber' => $this->cargo_order_number,
            'cargoWeight' => $this->cargo_weight,
            'cargoQuantity' => $this->cargo_quantity,
            'sealNumber' => $this->seal_number,
            'containerNumber' => $this->container_number,
            'loadingDate' => $this->loading_date,
            'loadingLocation' => new LocationResource($this->loadingLocation),
        ];
    }
}
