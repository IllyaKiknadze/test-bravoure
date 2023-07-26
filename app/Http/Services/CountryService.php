<?php

namespace App\Http\Services;

use App\Http\Helpers\ArrayPaginator;

class CountryService
{
    public function __construct(public YoutubeParser $youtubeParser, public WikipediaParser $wikipediaParser)
    {
    }

    public function getCountry(string $country, int $offset, int $page): array
    {
        $country           = $this->wikipediaParser->getData($country);
        $country['videos'] = $this->youtubeParser->getData($country);
//        $country           = json_decode(Storage::disk('public')->get('test.json'),true);
        $country['videos'] = (new ArrayPaginator())->paginate($country['videos'], $offset, $page);

        return $country;
    }
}
