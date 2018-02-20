<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Workout extends Model
{
    /**
     * The attributes that are NOT mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    public function athlete() {
        return $this->belongsTo('App\Athlete');
    }

    public function workoutType() {
        return $this->belongsTo('App\WorkoutType');
    }

    public function workoutExercises() {
        return $this->hasMany('App\WorkoutExercise');
    }
}
