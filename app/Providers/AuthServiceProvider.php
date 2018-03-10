<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

use App\WorkoutExercise;
use App\Athlete;
use App\Policies\Athlete\WorkoutExercisePolicy;
use App\Policies\Instructor\AthletePolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        WorkoutExercise::class => WorkoutExercisePolicy::class,
        Athlete::class => AthletePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
