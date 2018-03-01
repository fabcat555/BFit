<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ExerciseTechnique;

class ExerciseTechniqueController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function show($technique) {
        $exerciseTechnique = ExerciseTechnique::findOrFail($technique);

        return view('athlete.exercise-technique')->with('technique', $exerciseTechnique);
    }
}
