<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'firstName' => 'required',
            'lastName' => 'required',
            'birthDate' => 'required|date_format:Y-m-d',
            'phone' => 'required|numeric|digits:8',
            'email' => 'required|email|unique:users',
            'image' => 'required|mimes:jpeg,png,gif,svg|max:2048',
            'address' => 'required',
        ];
   }
   public function messages()
{
    return [
        'firstName.required' => 'First name is required.',
        'lastName.required' => 'Last name is required.',
        'birthDate.required' => 'Birth date is required.',
        'birthDate.date_format' => 'The birth date must be in the format YYYY-MM-DD.',
        'phone.required' => 'Phone number is required.',
        'phone.numeric' => 'Phone number must be numeric.',
        'phone.min' => 'Phone number must be at least :8 digits.',
        'phone.max' => 'Phone number must not exceed :11 digits.',
        'email.required' => 'Email address is required.',
        'email.email' => 'Please enter a valid email address.',
        'email.unique' => 'This email address is already in use.',
        'image.required' => 'The image is required',
        'image.mimes' => 'The image must be of type :jpeg,png,gif,svg.',
        'image.max' => 'The image must not exceed :2048 kilobytes.',
        'address.required' => 'Address is required.',
    ];
}

}
