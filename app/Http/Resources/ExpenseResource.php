<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ExpenseResource extends JsonResource
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
            'expenseSubcategory' =>  new ExpenseSubCategoryResource($this->expense_subcategory),
            'amountTZS'=> $this->amount_tzs,
            'amountUSD'=> $this->amount_usd,
            'exchangeRate'=> $this->exchange_rate,
            'currency' =>  new CurrencyResource($this->currency),
            'description'=> $this->description,
        ];
    }
}
