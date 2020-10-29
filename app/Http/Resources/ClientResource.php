<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClientResource extends JsonResource
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
            'name' => $this->client_name,
            'address' => $this->address,
            'phone' => $this->phone,
            'contactPerson' => $this->contact_name,
            'mobile' => $this->mobile,
            'email' => $this->email
        ];
    }
}
