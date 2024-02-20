<?php

namespace App\Http\Requests\Experience;

use Illuminate\Foundation\Http\FormRequest;

class StoreExperienceRequest extends FormRequest
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
            'title'=>'required',
            'small_description'=>'sometimes',
            'address'=>'required',
            'description'=>'required',
            'technologies'=>'required',
            'link'=>'sometimes|url'
        ];
    }
    public function messages()
{
    return [
        'date.required' => 'The date field is required.',
        'date.date_format' => 'The date must be in the format YYYY-MM-DD.',
        'title.required' => 'The title field is required.',
        'address.required' => 'The address field is required.',
        'description.required' => 'The description field is required.',
        'technologies.required' => 'The technologies field is required.',
        'link.url' => 'The link must be a valid URL.'
    ];
}
}
