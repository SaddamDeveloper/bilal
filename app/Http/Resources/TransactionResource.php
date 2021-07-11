<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResource extends JsonResource
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
            'amount' => $this->amount,
            'note' => $this->note,
            'date_and_time' => $this->created_at,
            'transaction_type' => TransactionTypeResource::make($this->whenLoaded('transactionType')),
            'currency' => CurrencyResource::make($this->whenLoaded('currency')),
            'sender' => UserResource::make($this->whenLoaded('senderUser')),
            'receiver' => UserResource::make($this->whenLoaded('receiverUser'))
        ];
    }
}
