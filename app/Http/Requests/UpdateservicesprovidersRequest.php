<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateservicesprovidersRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'nullable|string',
            'email' => 'nullable|email|unique:servicesproviders,email,' . $this->route('servicesprovider')->id,
            'phone_number' => 'nullable|string',
            'password' => 'nullable|string',
            'service' => 'nullable|string',
            'specialized' => 'nullable|string',
            'experience' => 'nullable|integer',
            'service_organization' => 'nullable|array',
            'status' => 'nullable|string',
            'amount' => 'nullable|string',
            'type' => 'nullable|string',
            'featured' => 'nullable|string',
            'certificate' => 'nullable|url',
            'profile_image' => 'nullable|url',
        ];
    }
}
