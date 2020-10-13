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
        return ['id'=>$this->id,
            'client_name'=>$this->client_name,
            'address'=>$this->address,
            'phone' =>$this->phone,
            'contact_name' =>$this->contact_name,
            'mobile' =>$this->mobile,
            'email' =>$this->email
        ];
    }
}
