<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateServicesRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'nullable|image',
            'featured' => 'nullable|string|in:Yes,No',
            'status' => 'sometimes|required|string',
            'amount' => 'sometimes|required|numeric',
            'type' => 'sometimes|required|string',
            'bookingsFee' => 'nullable|numeric',
            'bookingType' => 'nullable|string'
        ];
    }
}