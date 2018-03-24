<?php

namespace App\Http\Controllers\Instructor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\ExerciseTechnique;
use App\Http\Requests\ExerciseTechniqueCreateForm;

class ExerciseTechniquesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('instructor.exercise-techniques.index')->with('techniques', ExerciseTechnique::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('instructor.exercise-techniques.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExerciseTechniqueCreateForm $request)
    {
        ExerciseTechnique::create($request->all());

        return redirect(route('exercise-techniques.index'))->with('status', __('messages.CreatedExerciseTechnique'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('instructor.exercise-techniques.show')->with('technique', ExerciseTechnique::findOrFail($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('instructor.exercise-techniques.edit')->with('technique', ExerciseTechnique::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ExerciseTechniqueCreateForm $request, $id)
    {
        ExerciseTechnique::findOrFail($id)->fill($request->only(['name', 'description']))->save();

        return redirect(route('exercise-techniques.index'))->with('status', __('messages.UpdatedResource'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ExerciseTechnique::destroy($id);

        request()->session()->flash('status', __('messages.DeletedResource'));
        return response()->json(['status' => 'ok']);
    }
}
