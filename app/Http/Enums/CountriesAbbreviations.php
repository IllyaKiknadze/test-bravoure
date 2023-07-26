<?php

namespace App\Http\Enums;

use ArchTech\Enums\From;
use ArchTech\Enums\Names;

enum CountriesAbbreviations: string
{
    use Names,From;

    case UK = 'United States';
    case NL = 'Netherlands';
    case DE = 'Germany';
    case FR = 'France';
    case ES = 'Spain';
    case IT = 'Italy';
    case GR = 'Greece';
}
