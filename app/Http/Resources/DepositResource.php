<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Currency;

class DepositResource extends JsonResource
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
            'id'=> $this->id,
            'date'=> $this->date,
            'amount'=> $this->amount,
            'currency' => new Currency($this->currency),
            'exchangeRate'=> $this->exchange_rate,
            'description'=> $this->description,
        ];
    }
}
