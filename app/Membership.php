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

    protected $dates = [
        'start_date', 'end_date', 'created_at', 'updated_at'
    ];

    public function type() {
        return $this->belongsTo('App\MembershipType', 'type_id');
    }

    public function athlete() {
        return $this->belongsTo('App\Athlete');
    }
}
