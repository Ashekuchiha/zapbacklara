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
            'longitude' => 'nullable|numeric|between:-180,180',
            'latitude' => 'nullable|numeric|between:-90,90',
        ];
    }
}
