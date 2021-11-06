<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VehicleResource extends JsonResource
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
            'vehicleMake' => new VehicleMakeResource($this->vehicle_make),
            'yearModel' => $this->year_model,
            'chassisNumber' => $this->chassis_number,
            'modelConfiguration' => $this->model_configuration,
            'vehicleTransmissionType' => new VehicleTransmissionTypeResource($this->vehicle_transmission_type),
            'engineSize' => $this->engine_size,
            'authorizedPayload' => $this->authorized_payload,
            'length' => $this->length,
            'width' => $this->width,
            'height' => $this->height,
            'fuelType' => new FuelTypeResource($this->company),
            'fuelCapacity' => $this->fuel_capacity,
            'fuelConsumption' => $this->fuel_consumption,
            'company' => new CompanyResource($this->company),
            'vehicleType' => new VehicleTypeResource($this->vehicle_type),
            'activityStatus' => new StatusResource($this->status),
        ];
    }
}
