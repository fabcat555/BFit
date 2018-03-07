<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;

class AthleteComposer extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // View::composer(
        //     'athlete.dashboard', 'App\Http\ViewComposers\AthleteViewComposer'
        // );

    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
