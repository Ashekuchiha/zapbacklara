<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAppusersRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:appusers,email',
            'phone' => 'required|string|max:15',
            'dob' => 'required|date',
            'city' => 'required|string|max:255',
            'profile' => 'nullable|image',
            'password' => 'required|string|min:8',
        ];
    }
}
