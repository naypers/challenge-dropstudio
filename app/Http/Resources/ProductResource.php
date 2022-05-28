<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'          => $this->id,
            'name'        => $this->name,
            'sku'         => $this->sku,
            'id_category' => $this->id_category,
            'category'    => $this->getCategory->name,
            'description' => $this->description,
            'price'       => $this->price,
            'amount'      => $this->amount,
            'status'      => $this->status,
            'rating'      => $this->rating,
            'num_rating'  => $this->numRating,
        ];
    }
}
