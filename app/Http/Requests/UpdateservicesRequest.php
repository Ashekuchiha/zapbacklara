<?php

// namespace App\Http\Requests;

// use Illuminate\Foundation\Http\FormRequest;

// class UpdateservicesRequest extends FormRequest
// {
//     /**
//      * Determine if the user is authorized to make this request.
//      */
//     public function authorize(): bool
//     {
//         return false;
//     }

//     /**
//      * Get the validation rules that apply to the request.
//      *
//      * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
//      */
//     public function rules(): array
//     {
//         return [
//             //
//         ];
//     }
// }


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
            'status' => 'sometimes|required|string|in:Active,Inactive',
            'amount' => 'sometimes|required|numeric',
            'type' => 'sometimes|required|string',
            'bookingsFee' => 'nullable|numeric',
            'bookingType' => 'nullable|string'
        ];
    }
}