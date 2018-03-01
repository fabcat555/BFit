<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkoutExercise extends Model
{
    /**
     * The attributes that are NOT mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    public function exerciseProgresses() {
        return $this->hasMany('App\ExerciseProgress');
    }

    public function exercise() {
        return $this->belongsTo('App\Exercise');
    }

    public function exerciseTechnique() {
        return $this->belongsTo('App\ExerciseTechnique');
    }
}
