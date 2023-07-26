<?php

namespace App\Http\Interfaces;

use App\Http\Enums\CountriesAbbreviations;
use Illuminate\Support\Collection;

interface MediaParserInterface{
    public function getData(string $country): array;
}
