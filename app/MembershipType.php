<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MembershipType extends Model
{
    /**
     * The attributes that are NOT mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    public function memberships() {
        return $this->hasMany('App\Membership');
    }
}
