<?php

namespace App\Http\Controllers\Instructor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\ExerciseStep;

class ExerciseStepsController extends Controller
{
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ExerciseStep::destroy($id);

        request()->session()->flash('status', __('messages.DeletedResource'));
        return response()->json(['status' => 'ok']);
    }
}
