<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Request;

class CountryResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'name'        => $this['name'],
            'description' => $this['description'],
            'videos'      => YoutubeVideosResource::collection($this['videos'] ?? []),
        ];
    }
}
