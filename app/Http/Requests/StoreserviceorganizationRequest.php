<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreserviceorganizationRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'organizationName' => 'required|string|max:255',
            'ownerName' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'mapSelection' => 'required|array',
            'address' => 'required|string',
            'organizationBio' => 'nullable|string',
            'organizationDescription' => 'nullable|string',
            'organizationWebsite' => 'nullable|url',
            'phoneNumber' => 'required|string',
            'emergencyPhoneNumber' => 'nullable|string',
            'employeeNumbers' => 'required|integer',
            'organizationLogo' => 'nullable|string',
            'organizationBanner' => 'nullable|string',
            'tradeLicense' => 'nullable|string',
            'organizationDocuments' => 'nullable|json',
            'featured' => 'nullable|string',
        ];
    }
}
