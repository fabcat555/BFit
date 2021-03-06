<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExerciseStep extends Model
{
    /**
     * The attributes that are NOT mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    public function exercise() {
        return $this->belongsTo('App\Exercise');
    }
}
