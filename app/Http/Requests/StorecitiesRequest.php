<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorecitiesRequest extends FormRequest
{
    public function rules()
    {
        return [
            'CityName' => 'required|string|max:255',
            'StateName' => 'required|string|max:255',
            'pin' => 'nullable|string|max:10',
            'longitude' => 'required|numeric', // No restrictions
        'latitude' => 'required|numeric',  // No restrictions
        ];
    }
}
