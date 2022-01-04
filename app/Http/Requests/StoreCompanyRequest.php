<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCompanyRequest extends FormRequest
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
            'name' => ['required','min:2', 'unique:companies,name'],
            'email' => ['nullable', 'email'],
//            'logo' => ['image', 'dimensions:min_width=100,min_height=100'],
            'website' => ['nullable', 'url']
        ];
    }

    public function messages()
    {
        return [
            'name.unique' => 'Company already exists with that name',
            'logo.dimensions' => 'Image must be at least 100px X 100px'
        ];
    }
}
