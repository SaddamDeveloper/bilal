<?php

namespace App\Http\Resources;

use App\Models\Currency;
use Illuminate\Http\Resources\Json\JsonResource;

class ConvertCurrencyResource extends JsonResource
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
            'source_amount' => $this->source_amount,
            'converted_amount' => $this->converted_amount,
            'exchange_rate' => $this->exchange_rate,
            'exchange_fee' => $this->exchange_fee,
            'created_at' => $this->created_at,
            'user' => UserResource::make($this->whenLoaded('user')),
            'source_currency' => CurrencyResource::make($this->whenLoaded('sourceCurrency')),
            'target_currency' => CurrencyResource::make($this->whenLoaded('targetCurrency')),
        ];
    }
}
