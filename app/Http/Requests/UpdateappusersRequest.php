<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAppusersRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|email|unique:appusers,email,' . $this->route('appuser'),
            'phone' => 'nullable|string|max:15',
            'dob' => 'nullable|date',
            'city' => 'nullable|string|max:255',
            'profile' => 'nullable|image',
            'password' => 'nullable|string|min:8',
        ];
    }
}
