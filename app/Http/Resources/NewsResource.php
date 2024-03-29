<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class NewsResource extends JsonResource
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
            'title' => $this->title,
            'content' => $this->content,
            'news_date' => $this->news_date,
            'news_meta_id' => $this->news_meta_id,
            'comments' => CommentResource::collection($this->comments),
            'likes' => LikeResource::collection($this->likes),
            'user'=> $this->user->name,
            'edition_id' => $this->edition_id,
            'user_id' => $this->user_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
