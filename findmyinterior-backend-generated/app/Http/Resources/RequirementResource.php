<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RequirementResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $user = $request->user();
        $canSeeContact = $user && ($user->isAdmin() || $user->hasPremiumSubscription());

        return [
            'id'             => $this->id,
            'title'          => $this->title,
            'description'    => $this->description,
            'project_type'   => $this->project_type,
            'category'       => new CategoryResource($this->whenLoaded('category')),
            'budget_min'     => $this->budget_min,
            'budget_max'     => $this->budget_max,
            'formatted_budget' => $this->formatted_budget,
            'city'           => $this->city,
            'district'       => $this->district,
            'status'         => $this->status,
            'images'         => RequirementImageResource::collection($this->whenLoaded('images')),
            // Contact details — only for premium subscribers or admin
            'name'           => $canSeeContact ? $this->name : '***',
            'phone'          => $canSeeContact ? $this->phone : '+91 ***** *****',
            'email'          => $canSeeContact ? $this->email : null,
            'created_at'     => $this->created_at?->diffForHumans(),
        ];
    }
}
