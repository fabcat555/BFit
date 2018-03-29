<?php

namespace App\Http\Controllers\Instructor;

use Illuminate\Http\Request;
use App\Http\Requests\WorkoutCreateForm;
use App\Http\Controllers\Controller;
use Auth;

use App\Athlete;
use App\Exercise;
use App\ExerciseTechnique;
use App\Workout;
use App\WorkoutExercise;
use App\WorkoutType;

class WorkoutsController extends Controller
{

    public function __construct() {
        $this->middleware('auth:instructor');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('instructor.workouts.index')->with([
            'predefinedWorkouts' => Workout::predefinedWorkouts()->get(),
            'assignedWorkouts' => Workout::assignedWorkouts()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($athleteId = '0')
    {
        return view('instructor.workouts.create')->with([
            'athleteId' => $athleteId,
            'athletes' => Athlete::all(),
            'exercises' => Exercise::all(),
            'workouts' => Workout::predefinedWorkouts()->get(),
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
    public function store(Request $request)
    {
        $athleteId = $request->get('athlete_id');

        if ($request->get('workout_id')) {
            return $this->assignWorkout($request, $athleteId);
        } 
        
        else {
            $workout = Workout::create($request->only(['name', 'athlete_id', 'start_date', 'end_date', 'type_id']));
            $workout->save();

            $workoutDays = $request->get('workoutExercises');
            foreach ($workoutDays as $day => $workoutExercises) {
                foreach ($workoutExercises as $workoutExercise) {
                    WorkoutExercise::create([
                        'exercise_id' => $workoutExercise['exercise_id'],
                        'workout_id' => $workout->id,
                        'sets' => $workoutExercise['sets'],
                        'reps' => $workoutExercise['reps'],
                        'rest' => $workoutExercise['rest'],
                        'day' => $day,
                        'notes' => $workoutExercise['notes'],
                        'exercise_technique_id' => $workoutExercise['exercise_technique_id'],
                    ])->save();
                }
            }

            return redirect(route('workouts.index'))->with('status', __('messages.CreatedWorkout'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $workout = Workout::findOrFail($id);
        $workoutDays = $workout->workoutExercises->sortBy('day')->groupBy('day');
        
        return view('instructor.workouts.show')->with([
            'workout' => $workout,
            'workoutDays' => $workoutDays
        ]);
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
    public function update(Request $request, $id)
    {
        $workout = Workout::findOrFail($id);
        $workout->fill($request->only(['name', 'athlete_id', 'start_date', 'end_date', 'type_id']))->save();

        $workoutDays = $request->get('workoutExercises');
        foreach ($workoutDays as $day => $workoutExercises) {
            foreach ($workoutExercises as $workoutExercise) {
                if (isset($workoutExercise['workout_exercise_id'])) {
                    $exercise = WorkoutExercise::find($workoutExercise['workout_exercise_id']);
                    unset($workoutExercise['workout_exercise_id']);
                    $exercise->fill($workoutExercise)->save();
                } else {
                    WorkoutExercise::create([
                        'exercise_id' => $workoutExercise['exercise_id'],
                        'workout_id' => $workout->id,
                        'sets' => $workoutExercise['sets'],
                        'reps' => $workoutExercise['reps'],
                        'rest' => $workoutExercise['rest'],
                        'day' => $day,
                        'notes' => $workoutExercise['notes'],
                        'exercise_technique_id' => $workoutExercise['exercise_technique_id'],
                    ])->save();
                }
            }
        }

        return redirect(route('workouts.show', $id))->with('status', __('messages.UpdatedResource'));
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

        request()->session()->flash('status', __('messages.DeletedResource'));
        return response()->json(['status' => 'ok']);
    }

    public function assignWorkout(Request $request)
    {
        $athleteId = $request->get('athlete_id');
        $workout = Workout::findOrFail($request->get('workout_id'));
        $newWorkout = $workout->replicate();
        $newWorkout->athlete_id = $athleteId;
        $newWorkout->start_date = $request->get('start_date');
        $newWorkout->end_date = $request->get('end_date');
        $newWorkout->save();
        
        foreach ($workout->workoutExercises as $woExercise) {
            $newWoExercise = $woExercise->replicate();
            $newWoExercise->workout_id = $newWorkout->id;
            $newWoExercise->save();
            $newWorkout->workoutExercises->push($newWoExercise);
        }

        return redirect(route('instructor.athletes.show', ['instructor' => Auth::guard('instructor')->user(), 'athlete' => Athlete::find($athleteId)])
            )->with('status', __('messages.AssignedWorkoutMessage'));
    }

    public function viewAthletes($workoutId) {
        $workout = Workout::findOrFail($workoutId);
        $athletesAssigned = Auth::guard('instructor')->user()->athletes
            ->filter(function($athlete) use ($workout) {
                return ($athlete->currentWorkout()) ? $athlete->currentWorkout()->name == $workout->name : false;
        });
        
        return view('instructor.athletes.index')->with('athletes', $athletesAssigned);
    }
}
