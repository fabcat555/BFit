<?php

namespace App\Http\Controllers\Instructor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

use App\BodyMeasurement;
use App\Athlete;
use App\Http\Requests\BodyMeasurementCreateForm;

class BodyMeasurementsController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BodyMeasurementCreateForm $request)
    {
        BodyMeasurement::create($request->all())->save();

        return redirect()->back();
    }

    public function getAthleteMeasurements($athleteId, $measure = 'weight')
    {
        $athlete = Athlete::findOrFail($athleteId);
        $measurements = [];
        
        if (Auth::guard('instructor')->user()->can('view', $athlete)) {
            foreach ($athlete->bodyMeasurements->sortBy('created_at')->all() as $bm) {
                $measurements[$bm->created_at->format('d-m-y')] = $bm->$measure;
            }
            return $measurements;
        }
    }
}
