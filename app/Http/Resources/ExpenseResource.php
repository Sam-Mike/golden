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
            'amountTzs'=> number_format($this->amount_tzs, 2),
            'amountUsd'=> number_format($this->amount_usd, 2),
            'exchangeRate'=> number_format($this->exchange_rate, 2),
            'currency' =>  new CurrencyResource($this->currency),
            'description'=> $this->description,
        ];
    }
}
