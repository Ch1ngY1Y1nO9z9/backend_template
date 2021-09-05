<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'companyName' => 'required|max:255',
            'country' => 'required|max:255',
            'companyWebsite' => 'required|max:255',
            'business' => 'required|max:255',
            'email' => 'required|email|max:255',
        ];
    }

    public function messages()
    {
        return [
            'companyName.required' => 'Please provide a valid company name.',
            'companyName.max' => 'Company name is too long.',
            'country.required' => 'Please provide a valid country.',
            'country.max' => 'Country name is too long.',
            'companyWebsite.required' => 'Please provide a valid website link.',
            'companyWebsite.max' => 'website link is too long.',
            'business.required' => 'Please tell us what business you required.',
            'business.max' => 'Business column is too long.',
            'email.required' => 'Please provide a valid email.',
            'email.email' => 'Email format is invalid',
            'email.max' => 'Email address is too long',
        ];
    }
}
