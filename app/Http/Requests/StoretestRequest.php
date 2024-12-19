<?php

// namespace App\Http\Requests;

// use Illuminate\Foundation\Http\FormRequest;

// class StoretestRequest extends FormRequest
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

class StoreTestRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'password' => 'required|string|min:8',
            'email' => 'required|email|unique:tests,email',
            'profileImage' => 'nullable|image|max:2048',
            'birthday' => 'required|date',
            'favoriteColors' => 'required|array|min:1',
            'favoriteColors.*' => 'string|in:green,black,white',
        ];
    }
}
