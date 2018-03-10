<?php

namespace App\Policies\Instructor;

use App\Instructor;
use App\Athlete;
use Illuminate\Auth\Access\HandlesAuthorization;

class AthletePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the athlete.
     *
     * @param  \  $user
     * @param  \App\Athlete  $athlete
     * @return mixed
     */
    public function view(Instructor $instructor, Athlete $athlete)
    {
        return $instructor->id === $athlete->instructor->id || !isset($athlete->instructor);
    }

    /**
     * Determine whether the user can update the athlete.
     *
     * @param  \  $user
     * @param  \App\Athlete  $athlete
     * @return mixed
     */
    public function update(Instructor $instructor, Athlete $athlete)
    {
        return $instructor->id === $athlete->instructor->id || !isset($athlete->instructor);
    }

    /**
     * Determine whether the user can delete the athlete.
     *
     * @param  \  $user
     * @param  \App\Athlete  $athlete
     * @return mixed
     */
    public function delete(Instructor $instructor, Athlete $athlete)
    {
        return $instructor->id === $athlete->instructor->id || !isset($athlete->instructor);
    }
}
