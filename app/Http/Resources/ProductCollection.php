<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection->map(function($product){
                return [
                    'name' => $product->name,
                    'price' => $product->price,
                    'quantity_stock' => $product->quantity_stock
                ];
            }
        ),
        ];
    }
}
