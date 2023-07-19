<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed $id
 * @property mixed $user_id
 * @property mixed $category_id
 * @property mixed $slug
 * @property mixed $title
 * @property mixed $thumbnail
 * @property mixed $excerpt
 * @property mixed $body
 * @property mixed $created_at
 * @property mixed $updated_at
 */
class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'category_id' => $this->category_id,
            'tags' => TagResource::collection($this->whenLoaded('tags')),
            'slug' => $this->slug,
            'title' => $this->title,
            'thumbnail' => $this->thumbnail,
            'excerpt' => $this->excerpt,
            'body' => $this->body,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
