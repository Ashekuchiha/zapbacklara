<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateserviceorganizationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'organizationName' => 'nullable|string|max:255',
            'ownerName' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'mapSelection' => 'nullable|array|min:2',
            'organizationBio' => 'nullable|string',
            'organizationDescription' => 'nullable|string',
            'organizationWebsite' => 'nullable|url',
            'phoneNumber' => 'nullable|string|max:20',
            'emergencyPhoneNumber' => 'nullable|string|max:20',
            'employeeNumbers' => 'nullable|string|max:10',
            'organizationLogo' => 'nullable|file|mimes:jpg,jpeg,png',
            'organizationBanner' => 'nullable|file|mimes:jpg,jpeg,png',
            'tradeLicense' => 'nullable|file|mimes:pdf',
            'organizationDocuments' => 'nullable|file|mimes:pdf',
            'featured' => 'nullable|boolean',
        ];
    }
}
