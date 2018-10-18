<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AthleteCreateForm extends FormRequest
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
            'first_name' => 'required|min:2',
            'last_name' => 'required|min:2',
            'birth_date' => 'date_format:d/m/Y',
            'email' => 'required|email|unique:athletes',
            'password' => 'required|confirmed|min:6',
            'gender' => 'required',
            'height' => 'integer'
        ];
    }
}
