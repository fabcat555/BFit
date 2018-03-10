<?php

namespace App\Http\Controllers\Instructor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\WorkoutExercise;

class WorkoutExercisesController extends Controller
{

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        WorkoutExercise::destroy($id);

        return response()->json(['status' => 'ok']);
    }
}
