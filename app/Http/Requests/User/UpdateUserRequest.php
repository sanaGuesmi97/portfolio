<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'firstName' => 'sometimes',
            'lastName' => 'sometimes',
            'birthDate' => 'sometimes',
            'phone' => 'sometimes',
            'email' => 'sometimes',
            'image' => 'sometimes',
            'address' => 'sometimes',
        ];
    }

}
