<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Workout;
use Auth;

class AthleteWorkoutController extends Controller
{
    public function __construct() {
        $this->middleware('auth:athlete');
    }

    public function index() {
        return view('athlete.workout')->with('workout', Auth::guard('athlete')->user()->currentWorkout());
    }

    public function viewHistory() {
        $workouts = Workout::where('athlete_id', Auth::guard('athlete')->user()->id)->take(5)->orderBy('created_at', 'desc')->skip(1)->get();

        return view('athlete.workout-history')->with('workouts', $workouts);
    }
}
