<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    /**
     * The attributes that are NOT mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    public function membershipType() {
        return $this->belongsTo('App\MembershipType');
    }

    public function athlete() {
        return $this->belongsTo('App\Athlete');
    }
}
