@extends('layouts.master') 
@section('sidebar')
    @include('instructor.sidebar')
@endsection
 
@section('content')
<section id="main-content">
    <section class="wrapper site-min-height">
        <h3 class="bm-section-heading">
            <i class="fa fa-angle-right"></i> @lang('messages.NewWorkout')
        </h3>
        <!-- page start-->
        <div class="row mt">
            <div class="col-lg-12">
                <div class="form-panel">
    @include('shared.errors')
                    <form class="form-horizontal style-form" method="post" action="{{route('workouts.update', $workout->id)}}">
                        @csrf
                        {{ method_field('put') }}
                        <div class="form-group">
                            <label class="col-sm-1 control-label">@lang('messages.Name')</label>
                            <div class="col-sm-4">
                                <input name="name" required value="{{$workout->name}}" type="text" class="form-control">
                            </div>
                        </div>
                        @foreach($workout->workoutExercises as $key => $workoutExercise)
                        <div id="athlete-form" class="panel panel-default">
                            <div class="panel-heading">@lang('messages.Workout')</div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label class="col-sm-1 control-label">@lang('messages.Exercise')</label>
                                    <div class="col-sm-4">
                                        <select name="workoutExercises[{{$workoutExercise->id}}][exercise_id]" class="selectpicker" data-live-search="true">
                                            @foreach($exercises as $exercise)
                                            <option {{$exercise->id == $workoutExercise->exercise->id ? 'selected' : ''}} value="{{$exercise->id}}">{{$exercise->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <label class="col-sm-1 control-label">@lang('messages.Technique')</label>
                                    <div class="col-sm-4">
                                        <select name="workoutExercises[{{$workoutExercise->id}}][exercise_technique_id]" class="selectpicker" data-live-search="true">
                                            <option value=""></option>
                                            @foreach($exerciseTechniques as $technique)
                                            <option {{isset($workoutExercise->exerciseTechnique) && $technique->id == $workoutExercise->exerciseTechnique->id ? 'selected' : ''}} value="{{$technique->id}}">{{$technique->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-1 control-label">@lang('messages.Sets')</label>
                                    <div class="col-sm-2">
                                        <input name="workoutExercises[{{$workoutExercise->id}}][sets]" required value="{{$workoutExercise->sets}}" type="text" class="form-control">
                                    </div>
                                    <label class="col-sm-1 control-label">@lang('messages.Reps')</label>
                                    <div class="col-sm-2">
                                        <input name="workoutExercises[{{$workoutExercise->id}}][reps]" required value="{{$workoutExercise->reps}}" type="text" class="form-control">
                                    </div>
                                    <label class="col-sm-1 control-label">@lang('messages.Rest')</label>
                                    <div class="col-sm-2">
                                        <input name="workoutExercises[{{$workoutExercise->id}}][rest]" required value="{{$workoutExercise->rest}}" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">@lang('messages.Notes')</label>
                                    <div class="col-sm-12">
                                        <textarea name="workoutExercises[{{$workoutExercise->id}}][notes]" class="form-control">
                                            {{$workoutExercise->notes}}
                                        </textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <button type="submit" class="btn btn-primary pull-right">@lang('messages.Register')</button>
                        <div style="clear: both;"></div>
                    </form>
                </div>
            </div>
            <!-- col-lg-12-->
        </div>
        <!-- page end-->
    </section>
</section>
@endsection