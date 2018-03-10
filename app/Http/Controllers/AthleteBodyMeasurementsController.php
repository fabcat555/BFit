<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\Athlete;

class AthleteBodyMeasurementsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:athlete,instructor');
    }

    public function index() {
        $weightMeasurements = [];
        
        foreach(Auth::guard('athlete')->user()->bodyMeasurements->sortBy('created_at')->all() as $bm) {
            $weightMeasurements[$bm->created_at->format('d-m-y')] = $bm->weight;
        }

        return view('athlete.body-measurements')->with(['weightMeasurements' => $weightMeasurements]);
    }

    public function getMeasurements($measure = 'weight') {
        foreach(Auth::guard('athlete')->user()->bodyMeasurements->sortBy('created_at')->all() as $bm) {
            $measurements[$bm->created_at->format('d-m-y')] = $bm->$measure;
        }

        return $measurements;
    }
}
