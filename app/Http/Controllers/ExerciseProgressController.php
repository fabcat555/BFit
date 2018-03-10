<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\Http\Requests\ExerciseProgressCreateForm;
use App\ExerciseProgress;
use App\WorkoutExercise;


class ExerciseProgressController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:athlete');
    }

    public function show(WorkoutExercise $workoutExercise)
    {
        $exerciseProgresses = $workoutExercise->exerciseProgresses->sortBy('created_at');
        
        if (Auth::guard('athlete')->user()->can('view', $workoutExercise)) {
            $progress = [];
            foreach ($exerciseProgresses as $ep) {
                $progress[$ep->created_at->format('d-m-y h:m:s')] = $ep->weight;
            }

            return view('athlete.exercise-progress')->with([
                'progress' => $progress,
                'exerciseName' => $workoutExercise->exercise->name
            ]);
        }
        else {
            // redirect to unauthorized page
        }
    }

    public function store($exercise, ExerciseProgressCreateForm $request)
    {
        $ep = ExerciseProgress::create([
            'workout_exercise_id' => $exercise,
            'weight' => $request->get('weight'),
            'notes' => $request->get('notes')
        ]);
        $ep->save();

        return redirect()->refresh();
    }
}
