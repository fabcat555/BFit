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

    protected $dates = [
        'birth_date', 'start_date', 'end_date', 'created_at', 'updated_at'
    ];

    public function athlete() {
        return $this->belongsTo('App\Athlete');
    }

    public function type() {
        return $this->belongsTo('App\WorkoutType', 'type_id');
    }

    public function workoutExercises() {
        return $this->hasMany('App\WorkoutExercise');
    }

    public static function predefinedWorkouts() {
        return static::whereNull('athlete_id');
    }

    public static function assignedWorkouts() {
        return static::whereNotNull('athlete_id');
    }
}
