<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'zipcode' => 'required|string|regex:/^[0-9]{8}$/',
            'place' => 'required|string|max:255',
            'number' => 'required|string|regex:/^[0-9]{0,8}$/',
            'complement' => 'string|max:255',
            'district'=> 'required|string|max:255',
            'city' => 'required|string|max:150',
            'state' => 'required|string|max:150',
            'abbreviation_state' => 'required|string|regex:/^[A-Z]{2}$/'
        ];
    }

    /**
     * Get custom messages validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'The name field is required.',
            'name.string' => 'The name field must be a string.',
            'name.max' => 'The name field must not exceed 255 characters.',
            'zipcode.required' => 'The zipcode field is required',
            'zipcode.regex' => 'The zipcode field should not exceed eight numeric characteres',
            'place.required' => 'The place field is required',
            'place.max' => 'The place field must not exceed 255 characters.',
            'number.required' => 'The number field is required',
            'number.max' => 'The number field must not exceed 8 numeric characters.',
            'district.required' => 'The district field is required',
            'district.max' => 'The district field must not exceed 255 characters.',
            'city.required' => 'The city field is required',
            'city.max' => 'The city field must not exceed 150 characters.',
            'state.required' => 'The state field is required',
            'state.max' => 'The state field must not exceed 150 characters.',
            'abbreviation_state.required' => 'The abbreviation_state field is required',
            'abbreviation_state.regex' => 'The abbreviation_state field must not exceed 2 capital letters'
        ];
    }
}



