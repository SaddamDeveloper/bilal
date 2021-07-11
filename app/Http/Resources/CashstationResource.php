<?php

namespace App\Http\Resources;

use App\Models\CashstationComment;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class CashstationResource extends JsonResource
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
            'user' => UserResource::make($this->whenLoaded('user')),
            'location' => json_decode($this->location),
            'services' => json_decode($this->services),
            'comments_count' => $this->comments_count,
            'average_review' => $this->average_review,
            'reviews_count' => $this->reviews_count,
            'tagline' => $this->tagline,
            'max_fee_charge' => $this->max_fee_charge,
            'open_currency' => json_decode($this->open_currency),
            'status' => $this->status
        ];
    }
}
