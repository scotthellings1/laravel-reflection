<?php

namespace App\Http\Requests;

use App\Models\Company;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCompanyRequest extends FormRequest
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
        $regex = '/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/';
        return [
            'name' => ['required','min:2', Rule::unique('companies')->ignore($this->company->id)],
            'email' => 'nullable|email:filter',
//            'logo' => 'image|dimensions:min_width=100,min_height=100',
            'website' => 'nullable|regex:' . $regex
        ];
    }
    public function messages()
    {
        return [
            'logo.dimensions' => 'Image must be at least 100px X 100px',
            'website.regex' => 'Please provide a valid url'
        ];
    }
}
