<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BlogResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'           => $this->id,
            'title'        => $this->title,
            'slug'         => $this->slug,
            'excerpt'      => $this->excerpt,
            'content'      => $this->when($request->routeIs('*.blogs.show'), $this->content),
            'cover_image'  => $this->cover_image,
            'category'     => $this->category,
            'tags'         => $this->tag_list,
            'views_count'  => $this->views_count,
            'published_at' => $this->published_at?->toDateString(),
            'author'       => [
                'id'   => $this->author?->id,
                'name' => $this->author?->name,
            ],
        ];
    }
}
