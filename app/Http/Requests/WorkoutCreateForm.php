<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WorkoutCreateForm extends FormRequest
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
            'name' => 'required|min:2',
            'athlete_id' => 'nullable|numeric|exists:athletes,id',
            'type_id' => 'nullable|numeric|exists:workout_types,id',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'workoutExercises' => 'array|min:1',
        ];
    }
}
