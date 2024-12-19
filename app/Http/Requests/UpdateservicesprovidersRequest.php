<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateservicesprovidersRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'sometimes|string',
            'email' => 'sometimes|email|unique:servicesproviders,email,' . $this->route('servicesprovider')->id,
            'phone_number' => 'nullable|string',
            'password' => 'sometimes|string',
            'service' => 'sometimes|string',
            'specialized' => 'sometimes|string',
            'experience' => 'sometimes|integer',
            'service_organization' => 'sometimes|array',
            'status' => 'sometimes|string',
            'amount' => 'sometimes|string',
            'type' => 'sometimes|string',
            'featured' => 'sometimes|string',
            'certificate' => 'nullable|url',
            'profile_image' => 'nullable|url',
        ];
    }
}
