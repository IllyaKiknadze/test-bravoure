<?php

namespace App\Http\Requests;

use App\Http\Enums\CountriesAbbreviations;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;

class GetYoutubeVideosRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'page'    => 'numeric|nullable|integer|min:1',
            'offset'  => 'numeric|nullable|integer|min:1',
            'country' => 'required|in:'.Arr::join(CountriesAbbreviations::names(), ','),
        ];
    }
}
