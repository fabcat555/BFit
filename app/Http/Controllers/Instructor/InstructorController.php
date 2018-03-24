<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Exercise;
use App\Workout;
use App\WorkoutType;
use App\ExerciseTechnique;

class InstructorController extends Controller
{
    public function __construct() {
        $this->middleware('auth:instructor');
    }

    public function index() {
        return view('instructor.dashboard')->with([
            'instructor' => Auth::guard('instructor')->user(),
            'exercises' => Exercise::take(5)->get(),
            'workouts' => Workout::predefinedWorkouts()->take(5)->get(),
            'workoutTypes' => WorkoutType::take(5)->get(),
            'exerciseTechniques' => ExerciseTechnique::take(5)->get()
        ]);
    }
}
