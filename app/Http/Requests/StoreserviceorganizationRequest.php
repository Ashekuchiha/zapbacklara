<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreserviceorganizationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'organizationName' => 'required|string|max:255',
            'ownerName' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'mapSelection' => 'required|array|min:2',
            'organizationBio' => 'nullable|string',
            'organizationDescription' => 'nullable|string',
            'organizationWebsite' => 'nullable|url',
            'phoneNumber' => 'required|string|max:20',
            'emergencyPhoneNumber' => 'nullable|string|max:20',
            'employeeNumbers' => 'nullable|string|max:20',
            'organizationLogo' => 'nullable|image',
            'organizationBanner' => 'nullable|image',
            'tradeLicense' => 'nullable|image',
            'organizationDocuments' => 'nullable|image',
            'featured' => 'nullable|boolean',
        ];
    }
}
