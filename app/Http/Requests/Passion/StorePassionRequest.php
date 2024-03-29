<?php

namespace App\Http\Requests\Passion;

use Illuminate\Foundation\Http\FormRequest;

class StorePassionRequest extends FormRequest
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
            'title'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'The title field is required.',
        ];
    }
}
