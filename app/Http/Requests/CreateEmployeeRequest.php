<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateEmployeeRequest extends FormRequest
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
            'full_name'          => 'required|min:2|max:255',
            'date_of_employment' => 'date',
            'email'              => 'email',
            'salary'             => 'numeric|min:0|max:500000',
        ];
    }
}
