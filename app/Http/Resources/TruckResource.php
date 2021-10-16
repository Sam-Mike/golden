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
            'fleetNumber' => $this->fleet_number,
            'registrationNumber' => $this->registration_number,
            'vehicleMake' => new VehicleMakeResource($this->vehicle_make),
            'yearModel' => $this->year_model,
            'chassisNumber' => $this->chassis_number,
            'configurationModel' => $this->configuration_model,
            'vehicleTransmissionType' => new VehicleTransmissionTypeResource($this->company),
            'engineSize' => $this->engine_size,
            'authorizedPayload' => $this->authorized_payload,
            'length' => $this->length,
            'width' => $this->width,
            'height' => $this->height,
            'fuelType' => new FuelTypeResource($this->company),
            'fuelCapacity' => $this->fuel_capacity,
            'fuelConsumption' => $this->fuel_consumption,
            'company' => new CompanyResource($this->company),
            'truckType' => new TruckTypeResource($this->truck_type),
            'activityStatus' => new StatusResource($this->status),
        ];
    }
}
