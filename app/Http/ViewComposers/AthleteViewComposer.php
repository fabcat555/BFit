<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Repositories\UserRepository;
use Auth;

class AthleteViewComposer
{
    /**
     * The current logged in athlete.
     *
     * @var $athlete
     */
    protected $athlete;
    protected $membership;

    /**
     * Create a new athlete view composer.
     *
     * @param  Athlete  $athlete
     * @return void
     */
    public function __construct()
    {
        // Dependencies automatically resolved by service container...
        $this->athlete = Auth::guard('athlete')->user();
        $this->membership = $this->athlete->activeMembership();
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with([
            'athlete' => $this->athlete,
            'membership' => $this->membership,
        ]);
    }
}