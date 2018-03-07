<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Auth;

use App\Http\Requests\AthleteCreateForm;
use App\Http\Requests\AthleteUpdateForm;
use App\Athlete;

class AthletesController extends Controller
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
        return view('admin.athletes.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.athletes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\AthleteCreateForm  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AthleteCreateForm $request)
    {
        Athlete::create($request->all());

        return redirect(route('admin.athletes.index'))->with('status', __('messages.CreatedAthlete'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($athleteId)
    {
        $athlete = Athlete::find($athleteId);

        return view('admin.athletes.show')->with('athlete', $athlete);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($athlete)
    {   
        return view('admin.athletes.edit')->with('athlete', Athlete::find($athlete));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AthleteUpdateForm $request, $athleteId)
    {
        $athlete = Athlete::findOrFail($athlete);
        $athlete->first_name = $request->get('first_name');
        $athlete->last_name = $request->get('last_name');
        $athlete->birth_date = $request->get('birth_date');
        $athlete->email = $request->get('email');
        $athlete->gender = $request->get('gender');
        $athlete->height = $request->get('height');
        $athlete->notes = $request->get('notes');

        $athlete->save();

        return redirect(route('instructor.athletes.show',  $athlete))->with('status', __('messages.UpdatedResource'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($instructor, $athlete)
    {
        Athlete::destroy($athlete);

        return redirect()->back()->with('status', __('messages.DeletedResource'));
    }
}
