<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SupplierProductResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'              => $this->id,
            'name'            => $this->name,
            'slug'            => $this->slug,
            'description'     => $this->description,
            'cover_image'     => $this->cover_image,
            'category'        => $this->category,
            'unit'            => $this->unit,
            'price_min'       => $this->price_min,
            'price_max'       => $this->price_max,
            'formatted_price' => $this->formatted_price,
            'images'          => SupplierProductImageResource::collection($this->whenLoaded('images')),
        ];
    }
}
