<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    /**
     * The attributes that are NOT mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    public function exerciseSteps() {
        return $this->hasMany('App\ExerciseStep');
    }
}
