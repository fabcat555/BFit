<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ExerciseProgressCreateForm;
use App\ExerciseProgress;
use App\WorkoutExercise;

class ExerciseProgressController extends Controller
{
    public function __construct() {
        $this->middleware('auth:athlete');
    }

    public function show($exercise) {
        $exerciseProgresses = ExerciseProgress::where('workout_exercise_id', $exercise)->orderBy('created_at')->get();
        $progress = [];
        foreach($exerciseProgresses as $ep) {
            $progress[$ep->created_at->format('d-m-y h:m:s')] = $ep->weight;
        }

        return view('athlete.exercise-progress')->with([
            'progress' => $progress, 
            'exerciseName' => WorkoutExercise::find($exercise)->exercise->name
        ]);
    }

    public function store($exercise, ExerciseProgressCreateForm $request) {
        $ep = ExerciseProgress::create([
            'workout_exercise_id' => $exercise,
            'weight' => $request->get('weight'),
            'notes' => $request->get('notes') 
        ]);
        $ep->save();

        return redirect()->refresh();
    }
}
