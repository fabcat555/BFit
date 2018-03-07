<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Auth;

use App\Http\Requests\InstructorCreateForm;
use App\Http\Requests\InstructorUpdateForm;
use App\Instructor;

class InstructorsController extends Controller
{
    public function __construct() {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.instructors.index')->with('instructors', Instructor::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.instructors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\InstructorCreateForm  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InstructorCreateForm $request)
    {
        Instructor::create([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'birth_date' => $request->get('birth_date'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password'))
        ]);

        return redirect(route('instructors.index'))->with('status', __('messages.CreatedInstructor'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($instructorId)
    {
        $instructor = Instructor::find($instructorId);

        return view('admin.instructors.show')->with('instructor', $instructor);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($instructor)
    {   
        return view('admin.instructors.edit')->with('instructor', Instructor::find($instructor));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(InstructorUpdateForm $request, $instructorId)
    {
        $instructor = Instructor::findOrFail($instructor);
        $instructor->first_name = $request->get('first_name');
        $instructor->last_name = $request->get('last_name');
        $instructor->birth_date = $request->get('birth_date');
        $instructor->email = $request->get('email');
        $instructor->gender = $request->get('gender');
        $instructor->height = $request->get('height');
        $instructor->notes = $request->get('notes');

        $instructor->save();

        return redirect(route('instructor.instructors.show', $instructor))->with('status', __('messages.UpdatedResource'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($instructor)
    {
        Instructor::destroy($instructor);

        return redirect()->back()->with('status', __('messages.DeletedResource'));
    }
}
