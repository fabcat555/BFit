<?php

namespace App\Http\Controllers\Instructor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Exercise;
use App\ExerciseStep;

use App\Http\Requests\ExerciseCreateForm;

class ExercisesController extends Controller
{
    public function __construct() {
        $this->middleware('auth:instructor,athlete', ['except' => 'show']);
    }    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('instructor.exercises.index')->with('exercises', Exercise::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('instructor.exercises.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExerciseCreateForm $request)
    {
        $exercise = Exercise::create(['name' => $request->get('name')]);
        $exercise->save();

        foreach($request->get('steps') as $step) {
            ExerciseStep::create(['description' => $step, 'exercise_id' => $exercise->id]);
        }

        return redirect(route('exercises.index'))->with('status', __('messages.CreatedExercise'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('instructor.exercises.show')->with('exercise', Exercise::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('instructor.exercises.edit')->with('exercise', Exercise::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ExerciseCreateForm $request, $id)
    {
        $exercise = Exercise::findOrFail($id);
        $exercise->name = $request->get('name');

        foreach($request->get('exerciseSteps') as $stepId => $stepData) {
            $step = ExerciseStep::find($stepId);
            $step->fill($stepData);
            $step->save();
        }

        return redirect(route('exercises.show', $id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Exercise::destroy($id);

        return redirect()->back()->with('status', __('messages.DeletedResource'));
    }
}
