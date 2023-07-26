<?php

namespace App\Http\Services;

use Alaouy\Youtube\Facades\Youtube;
use App\Http\Interfaces\MediaParserInterface;
use Illuminate\Support\Facades\Redis;

class YoutubeParser implements MediaParserInterface
{
    public function getData(string $country): array
    {
        $redis = Redis::connection();

        if ($redis->exists($country)) {
            return $redis->get($country);
        }

        $videos = Youtube::getPopularVideos($country);
        $redis->set($country, $videos, 'EX', 60 * 60);

        return $videos;
    }
}
