<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Auth;

use App\Athlete;
use App\Instructor;
use App\Http\Requests\AthleteCreateForm;
use App\Http\Requests\AthleteUpdateForm;


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
        return view('admin.athletes.index')->with('athletes', Athlete::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.athletes.create')->with('instructors', Instructor::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\AthleteCreateForm  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AthleteCreateForm $request)
    {
        Athlete::create($request->except(['password_confirmation']));

        return redirect(route('athletes.index'))->with('status', __('messages.CreatedAthlete'));
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
        $athlete = Athlete::findOrFail($athleteId);
        $athlete->fill($request->except('athlete_id'))->save();

        return redirect(route('athletes.show',  $athlete))->with('status', __('messages.UpdatedResource'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($athlete)
    {
        Athlete::destroy($athlete);

        request()->session()->flash('status', __('messages.DeletedResource'));
        return response()->json(['status' => 'ok']);
    }
}
