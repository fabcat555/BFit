<?php

namespace App\Http\Controllers\Instructor;

use Illuminate\Http\Request;
use App\Http\Requests\WorkoutCreateForm;
use App\Http\Controllers\Controller;

use App\Athlete;
use App\Exercise;
use App\ExerciseTechnique;
use App\Workout;
use App\WorkoutExercise;
use App\WorkoutType;

class WorkoutsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('instructor.workouts.index')->with('workouts', Workout::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('instructor.workouts.create')->with([
            'athletes' => Athlete::all(),
            'exercises' => Exercise::all(),
            'workoutTypes' => WorkoutType::all(),
            'exerciseTechniques' => ExerciseTechnique::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WorkoutCreateForm $request)
    {
        $workout = Workout::create($request->only(['name', 'athlete_id', 'start_date', 'end_date', 'type_id']));
        $workout->save();

        $workoutExercises = $request->get('workoutExercises');
        foreach($workoutExercises as $workoutExercise) {
            WorkoutExercise::create([
                'exercise_id' => $workoutExercise['exercise_id'],
                'workout_id' => $workout->id,
                'sets' => $workoutExercise['sets'],
                'reps' => $workoutExercise['reps'],
                'rest' => $workoutExercise['rest'],
                'day' => $workoutExercise['day'],
                'notes' => $workoutExercise['notes'],
                'exercise_technique_id' => $workoutExercise['exercise_technique_id'],
            ])->save();
        }

        return redirect(route('workouts.index'))->with('status', __('messages.CreatedWorkout'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('instructor.workouts.show')->with('workout', Workout::findOrFail($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('instructor.workouts.edit')->with([
            'workout' => Workout::findOrFail($id),
            'athletes' => Athlete::all(),
            'exercises' => Exercise::all(),
            'workoutTypes' => WorkoutType::all(),
            'exerciseTechniques' => ExerciseTechnique::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(WorkoutCreateForm $request, $id)
    {
        $workout = Workout::findOrFail($id);
        $workout->fill($request->only(['name', 'athlete_id', 'start_date', 'end_date', 'type_id']))->save();

        $workoutExercises = $request->get('workoutExercises');
        foreach($workoutExercises as $exerciseId => $data) {
            $exercise = WorkoutExercise::find($exerciseId);
            $exercise->fill($data)->save();
        }

        return redirect(route('workouts.show', $id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Workout::destroy($id);

        return redirect(route('workouts.index'))->with('status', __('messages.DeletedResource'));
    }
}