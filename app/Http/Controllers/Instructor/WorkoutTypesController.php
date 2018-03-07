<?php

namespace App\Http\Controllers\Instructor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\WorkoutType;
use App\Http\Requests\WorkoutTypeCreateForm;

class WorkoutTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('instructor.workout-types.index')->with('workoutTypes', WorkoutType::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('instructor.workout-types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WorkoutTypeCreateForm $request)
    {
        WorkoutType::create($request->all());

        return redirect(route('workout-types.index'))->with('status', __('messages.CreatedWorkoutType'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('instructor.workout-types.show')->with('workoutType', WorkoutType::findOrFail($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('instructor.workout-types.edit')->with('workoutType', WorkoutType::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(WorkoutTypeCreateForm $request, $id)
    {
        WorkoutType::findOrFail($id)->fill($request->only(['name', 'description']))->save();

        return redirect(route('workout-types.show', $id))->with('status', __('messages.UpdatedResource'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        WorkoutType::destroy($id);

        return redirect()->back()->with('status', __('messages.DeletedResource'));
    }
}
