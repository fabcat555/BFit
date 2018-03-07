<?php

namespace App\Http\Controllers\Instructor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\BodyMeasurement;
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
}
