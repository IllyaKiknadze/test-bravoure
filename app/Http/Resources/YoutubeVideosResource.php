<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class YoutubeVideosResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'title'       => $this->resource->snippet->title,
            'description' => $this->resource->snippet->description,
            'thumbnails'  => $this->resource->snippet->thumbnails,
        ];
    }
}
