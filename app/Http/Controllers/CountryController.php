<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetYoutubeVideosRequest;
use App\Http\Resources\CountryResource;
use App\Http\Services\CountryService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;

class CountryController extends Controller
{
    public function __construct(public CountryService $countryService)
    {
    }

    public function index(GetYoutubeVideosRequest $request): JsonResponse
    {
        $key = Arr::join($request->only('offset', 'country', 'page'), ',');

        if (Cache::has($key)) {
            $country = Cache::get($key);

            return response()->json(CountryResource::make($country));
        }

        $country = $this->countryService->getCountry(
            country: $request->get('country'),
            offset: $request->get('offset'),
            page: $request->get('page')
        );

        Cache::put($key, $country, 60 * 60);

        return response()->json(CountryResource::make($country));
    }
}
