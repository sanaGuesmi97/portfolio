<?php

namespace App\Http\Requests\Framework;

use Illuminate\Foundation\Http\FormRequest;

class StoreFrameworkRequest extends FormRequest
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
            'frontEnd'=>'required',
            'backEnd'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'frontEnd.required' => 'The frontEnd field is required.',
            'backEnd.required' => 'The backEnd field is required.',
         
            
        ];
    }
}
