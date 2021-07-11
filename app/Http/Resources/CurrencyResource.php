<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CurrencyResource extends JsonResource
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
            'code' => $this->code,
            'country' => $this->country,
            'name' => $this->name,
            'symbol' => $this->symbol,
            'flag' => $this->flag,
            'published' => $this->published
        ];
    }
}
