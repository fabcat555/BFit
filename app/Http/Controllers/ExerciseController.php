<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exercise;

class ExerciseController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function show($exerciseId) {
        $exercise = Exercise::findOrFail($exerciseId);

        return view('athlete.exercise')->with('exercise', $exercise);
    }
}
