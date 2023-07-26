<?php

namespace App\Http\Services;

use App\Http\Enums\CountriesAbbreviations;
use App\Http\Interfaces\MediaParserInterface;
use Illuminated\Wikipedia\Wikipedia;

class WikipediaParser implements MediaParserInterface
{
    public function getData(string $country): array
    {
        $name        = CountriesAbbreviations::fromName($country)->value;
        $description = explode("\n", (new Wikipedia)->page($name)->getSections()[0]->body)[0];

        return ['name' => $name, 'description' => $description];
    }
}
