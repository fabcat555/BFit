<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Athlete extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are NOT mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function workouts() {
        return $this->hasMany('App\Workout');
    }

    public function memberships() {
        return $this->hasMany('App\Membership');
    }

    public function bodyMeasurements() {
        return $this->hasMany('App\BodyMeasurement');
    }

    public function instructor() {
        return $this->belongsTo('App\Instructor');
    }
}
