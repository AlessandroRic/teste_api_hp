<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PurchaseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function additional(array $data)
    {
        return [
            "products_id" => $this->products_id,
            "quantity" => $this->quantity,
            "owner" => $this->owner,
            "card_number" => $this->card_number,
            "date_expiration" => $this->date_expiration,
            "flag" => $this->flag,
            "cvv" => $this->cvv
        ];
    }
}
