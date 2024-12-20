<?php

// namespace App\Http\Requests;

// use Illuminate\Foundation\Http\FormRequest;

// class UpdatetestRequest extends FormRequest
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

class UpdateTestRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'sometimes|string|max:255',
            'password' => 'sometimes|string|min:8',
            'email' => 'sometimes|email|unique:tests,email,' . $this->route('test'),
            'profileImage' => 'nullable|image|max:5120',
            'birthday' => 'sometimes|date',
            'favoriteColors' => 'sometimes|array|min:1',
            'favoriteColors.*' => 'string|in:green,black,white',
        ];
    }
}
