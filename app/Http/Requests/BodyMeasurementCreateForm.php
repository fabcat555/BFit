<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BodyMeasurementCreateForm extends FormRequest
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
            'weight' => 'required|numeric',
            'chest' => 'required|numeric',
            'waist' => 'required|numeric',
            'hips' => 'required|numeric',
            'thighs' => 'required|numeric',
            'calves' => 'required|numeric',
            'biceps' => 'required|numeric',
        ];
    }
}
