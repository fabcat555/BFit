<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AthleteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:athlete');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        foreach(Auth::guard('athlete')->user()->bodyMeasurements->sortBy('created_at')->all() as $bm) {
            $weightMeasurements[$bm->created_at->format('d-m-y')] = $bm->weight;
        }
        
        return view('athlete.dashboard')->with(['weightMeasurement' => $weightMeasurements]);   
    }
}