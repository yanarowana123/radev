<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:employees',
            'phone' => 'required|max:255',
            'school_id' => 'required|exists:schools,id',
            'school_name' => 'nullable'
        ];

        if ($this->isMethod('PUT')) {
            $rules['email'] = 'required|email|max:255|unique:employees,email,' . $this->employee->id;
        }

        return $rules;
    }
}
