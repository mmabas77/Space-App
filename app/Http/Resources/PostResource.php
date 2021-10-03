<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Request;

class PostResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'post_id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'image' => $this->image ?? '',
            'categories' => CategoryResource::collection($this->whenLoaded('categories')),
            'user_id' => $this->user->id,
            'social_links' => $this->social_link ?? [],
            'slug' => $this->slug ?? '',
            'link' => route('post.view', $this->id),
        ];
    }

}
