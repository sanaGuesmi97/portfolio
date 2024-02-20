<?php

namespace App\Http\Requests\Education;

use Illuminate\Foundation\Http\FormRequest;

class StoreEducationRequest extends FormRequest
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
            'date'=>'required|date_format:Y-m-d',
            'address'=>'required',
            'title'=>'required',
            'technologies'=>'required',
        ];
    }
    public function messages()
{
    return [
        'date.required' => 'The date field is required.',
        'date.date_format' => 'The date must be in the format YYYY-MM-DD.',
        'address.required' => 'The address field is required.',
        'title.required' => 'The title field is required.',
        'technologies.required' => 'The technologies field is required.',
     
    ];
}
}
