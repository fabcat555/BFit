<?php

namespace App\Http\Controllers\Instructor;

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
        $this->middleware('auth:instructor');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('instructor.athletes.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('instructor.athletes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\AthleteCreateForm  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AthleteCreateForm $request)
    {
        Athlete::create([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'birth_date' => $request->get('birth_date'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'gender' => $request->get('gender'),
            'height' => $request->get('height'),
            'notes' => $request->get('notes'),
            'instructor_id' => Auth::guard('instructor')->user()->id
        ]);

        return redirect(route('instructor.athletes.index', Auth::guard('instructor')->user()))
                    ->with('status', __('messages.CreatedAthlete'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($instructorId, $athleteId)
    {
        $athlete = Athlete::find($athleteId);

        if (Auth::guard('instructor')->user()->can('view', $athlete)) {
            $weightMeasurements = [];
            foreach ($athlete->bodyMeasurements->sortBy('created_at')->all() as $bm) {
                $weightMeasurements[$bm->created_at->format('d-m-y')] = $bm->weight;
            }
            
            return view('instructor.athletes.show')->with([
                'athlete' => $athlete, 
                'workout' => $athlete->currentWorkout(),
                'weightMeasurements' => $weightMeasurements
            ]);
        }
        else {
           return 'non sei autorizzato';
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($athleteId)
    {
        $athlete = Athlete::find($athleteId);

        if (Auth::guard('instructor')->user()->can('update', $athlete)) {
            return view('instructor.athletes.edit')->with('athlete', $athlete);
        }
        else {
            return 'non sei autorizzato';
        }
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

        return redirect(route('instructor.athletes.show', ['instructor' => Auth::guard('instructor')->user()->id, 'athlete' => $athlete->id]))
            ->with('status', __('messages.UpdatedResource'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($instructorId, $athleteId)
    {
        $athlete = Athlete::findOrFail($athleteId);

        if (Auth::guard('instructor')->user()->can('delete', $athlete)) {
            $athlete->delete();

            request()->session()->flash('status', __('messages.DeletedResource'));
            return response()->json(['status' => 'ok']);
        }
        else {
            return 'non sei autorizzato';
        }
    }
}
