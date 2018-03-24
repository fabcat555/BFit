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
        $this->middleware('auth:athlete,instructor');
    }

    public function show(WorkoutExercise $workoutExercise)
    {
        $exerciseProgresses = $workoutExercise->exerciseProgresses->sortBy('created_at');
        $progress =  $this->getProgress($exerciseProgresses, $workoutExercise);
        
        if (Auth::guard('athlete')->check()) {
            if (Auth::guard('athlete')->user()->can('view', $workoutExercise)) {
                $view = 'athlete.exercise-progress';
            }
        } 
        elseif (Auth::guard('instructor')->check()) {
            if (Auth::guard('instructor')->user()->can('view', $workoutExercise->workout->athlete)) {
                $view = 'instructor.athletes.exercise-progress';
            }
        } else {
            // redirect to unauthorized page
        }

        return view($view)->with([
            'progress' =>  $progress,
            'exerciseName' => $workoutExercise->exercise->name
        ]);
    }

    public function getProgress($exerciseProgresses, $workoutExercise)
    {
        $progress = [];
        foreach ($exerciseProgresses as $ep) {
            $progress[$ep->created_at->format('d-m-y h:i:s')] = $ep->weight;
        }
        return $progress;
    }

    public function store($exercise, ExerciseProgressCreateForm $request)
    {
        $ep = ExerciseProgress::create([
            'workout_exercise_id' => $exercise,
            'weight' => $request->get('weight')
        ]);
        $ep->save();

        return redirect()->refresh();
    }
}
