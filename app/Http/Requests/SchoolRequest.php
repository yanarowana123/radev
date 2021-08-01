<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SchoolRequest extends FormRequest
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
        $rules = [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:schools',
            'website' => 'required|max:255',
            'logo' => 'required|image|dimensions:min_width=150,min_height=150',
        ];

        if ($this->isMethod('PUT')) {
            $rules['logo'] = 'nullable|image|dimensions:min_width=150,min_height=150';
            $rules['email'] = 'required|email|max:255|unique:schools,email,' . $this->school->id;
        }

        return $rules;
    }
}
