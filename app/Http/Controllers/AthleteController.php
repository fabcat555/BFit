<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AthleteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:athlete');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $athlete = Auth::guard('athlete')->user();
        $currentWorkout = $athlete->currentWorkout();
        $workoutDays = [];
        $weightMeasurements = [];

        if ($currentWorkout)
            $workoutDays = $currentWorkout->workoutExercises->groupBy('day');

        foreach($athlete->bodyMeasurements->sortBy('created_at')->all() as $bm) {
            $weightMeasurements[$bm->created_at->format('d-m-y h:m:s')] = $bm->weight;
        }
        
        return view('athlete.dashboard')->with([
            'athlete' => $athlete,
            'membership' => $athlete->activeMembership(),
            'workout' => $currentWorkout,
            'workoutDays' => $workoutDays,
            'weightMeasurements' => $weightMeasurements
        ]);   
    }
}