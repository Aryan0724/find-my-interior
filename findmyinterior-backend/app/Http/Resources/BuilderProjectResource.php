<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BuilderProjectResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'                  => $this->id,
            'title'               => $this->title,
            'slug'                => $this->slug,
            'description'         => $this->description,
            'cover_image'         => $this->cover_image,
            'project_type'        => $this->project_type,
            'location'            => $this->location,
            'city'                => $this->city,
            'bhk_options'         => $this->bhk_options,
            'area_sqft_min'       => $this->area_sqft_min,
            'area_sqft_max'       => $this->area_sqft_max,
            'price_min'           => $this->price_min,
            'price_max'           => $this->price_max,
            'formatted_price'     => $this->formatted_price,
            'possession_date'     => $this->possession_date?->format('M Y'),
            'is_possession_ready' => $this->is_possession_ready,
            'status'              => $this->status,
            'is_featured'         => $this->is_featured,
            'builder'             => new BuilderResource($this->whenLoaded('builder')),
            'images'              => BuilderProjectImageResource::collection($this->whenLoaded('images')),
        ];
    }
}
