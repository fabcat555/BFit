<?php

namespace App\Policies\Athlete;

use App\Athlete;
use App\WorkoutExercise;
use Illuminate\Auth\Access\HandlesAuthorization;

class WorkoutExercisePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the workoutExercise.
     *
     * @param  \  $user
     * @param  \App\WorkoutExercise  $workoutExercise
     * @return mixed
     */
    public function view(Athlete $athlete, WorkoutExercise $workoutExercise)
    {
        return $athlete->id === $workoutExercise->workout->athlete->id;
    }
}
