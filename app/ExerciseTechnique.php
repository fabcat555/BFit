<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExerciseTechnique extends Model
{
    /**
     * The attributes that are NOT mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];
}
