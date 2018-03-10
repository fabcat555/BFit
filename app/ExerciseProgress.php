<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExerciseProgress extends Model
{
    /**
     * The attributes that are NOT mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    public function workoutExercise() {
        return $this->belongsTo('App\WorkoutExercise');
    }
}
