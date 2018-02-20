<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkoutType extends Model
{
    /**
     * The attributes that are NOT mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    public function workouts() {
        return $this->hasMany('App\Workout');
    }
}
