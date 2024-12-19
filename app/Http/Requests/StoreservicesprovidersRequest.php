<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreservicesprovidersRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|string',
            'email' => 'required|email|unique:servicesproviders',
            'phone_number' => 'nullable|string',
            'password' => 'required|string',
            'service' => 'required|string',
            'specialized' => 'required|string',
            'experience' => 'required|integer',
            'service_organization' => 'required|array',
            'status' => 'required|string',
            'amount' => 'required|string',
            'type' => 'required|string',
            'featured' => 'required|string',
            'certificate' => 'nullable|url',
            'profile_image' => 'nullable|url',
        ];
    }
}
