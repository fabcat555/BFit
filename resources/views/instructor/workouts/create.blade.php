@extends('layouts.master') 
@section('sidebar')
    @include('instructor.sidebar')
@endsection
 
@section('topbar')
    @include('instructor.topbar')
@endsection
 
@section('title', __('messages.WorkoutCreate')) 
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
                    <form class="form-horizontal style-form" method="post" action="{{route('workouts.store')}}">
                        @csrf
                        <div class="panel panel-danger">
                            <div class="panel-heading">
                                <h3 class="panel-title">@lang('messages.WorkoutData')</h3>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label class="col-sm-1 control-label">@lang('messages.Name')</label>
                                    <div class="col-sm-2">
                                        <input name="name" type="text" required class="form-control">
                                    </div>
                                    <label class="col-sm-1 control-label">@lang('messages.Athlete')</label>
                                    <div class="col-sm-2">
                                        <select id="athlete-select" @if($athleteId !='0' ) disabled @endisset class="selectpicker" data-live-search="true" name="athlete_id">
                                            <option label=" "></option>
                                            @foreach($athletes as $athlete)
                                                <option @if($athleteId == $athlete->id) selected @endif value="{{$athlete->id}}">{{$athlete->first_name}} {{$athlete->last_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <label class="col-sm-1 control-label">@lang('messages.WorkoutType')</label>
                                    <div class="col-sm-2">
                                        <select name="type_id" class="selectpicker" data-live-search="true">
                                            <option label=" "></option>
                                            @foreach($workoutTypes as $wt)
                                                <option value="{{$wt->id}}">{{$wt->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-1 control-label">@lang('messages.StartDate')</label>
                                    <div class="col-sm-3">
                                        <input id="start-date" name="start_date" type="date" class="form-control">
                                    </div>
                                    <label class="col-sm-1 control-label">@lang('messages.EndDate')</label>
                                    <div class="col-sm-3">
                                        <input id="end-date" name="end_date" type="date" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="btn-group btn-group-justified">
                            <div class="btn-group">
                                <button id="pw-toggle" type="button" class="btn btn-default">@lang('messages.AssignPredefinedWorkout')</button>
                            </div>
                            <div class="btn-group">
                                <button id="nw-toggle" type="button" class="btn btn-default">@lang('messages.WorkoutCreate')</button>
                            </div>
                        </div>
                        <div id="workout-day-1" class="panel panel-danger workout-day mt">
                            <div class="panel-heading">
                                @lang('messages.Day') 1
                            </div>
                            <div class="panel-body" data-day="1">
                                <div class="panel panel-default exercise-panel" data-exercise="1">
                                    <div class="panel-heading">@lang('messages.Exercise') 1</div>
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <label class="col-sm-1 control-label">@lang('messages.Exercise')</label>
                                            <div class="col-sm-4">
                                                <select name="workoutExercises[1][0][exercise_id]" class="selectpicker" data-live-search="true">
                                                    @foreach($exercises as $exercise)
                                                        <option value="{{$exercise->id}}">{{$exercise->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <label class="col-sm-1 control-label">@lang('messages.Technique')</label>
                                            <div class="col-sm-4">
                                                <select name="workoutExercises[1][0][exercise_technique_id]" class="selectpicker" data-live-search="true">
                                                    <option label=" "></option>
                                                    @foreach($exerciseTechniques as $technique)
                                                        <option value="{{$technique->id}}">{{$technique->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-1 control-label">@lang('messages.Sets')</label>
                                            <div class="col-sm-2">
                                                <input name="workoutExercises[1][0][sets]" type="text" class="form-control">
                                            </div>
                                            <label class="col-sm-1 control-label">@lang('messages.Reps')</label>
                                            <div class="col-sm-2">
                                                <input name="workoutExercises[1][0][reps]" type="text" class="form-control">
                                            </div>
                                            <label class="col-sm-1 control-label">@lang('messages.Rest')</label>
                                            <div class="col-sm-2">
                                                <input name="workoutExercises[1][0][rest]" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">@lang('messages.Notes')</label>
                                            <div class="col-sm-12">
                                                <textarea name="workoutExercises[1][0][notes]" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-default pull-right add-exercise">@lang('messages.AddExercise')</button>
                            </div>
                        </div>
                        <div id="predefined-workout" class="panel panel-danger mt">
                            <div class="panel-heading">@lang('messages.Workout')</div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <select id="workout-select" name="workout_id" required class="selectpicker form-control" data-live-search="true">
                                            <option label=" "></option>
                                            @foreach($workouts as $workout)
                                                <option value="{{$workout->id}}">{{$workout->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button id="workout-create-submit" type="submit" class="btn btn-primary pull-right">@lang('messages.Register')</button>
                        <button id="add-day" type="button" class="btn btn-default pull-left">@lang('messages.AddWorkoutDay')</button>
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
 
@push('script')
<script>
    $(function () {
        var days = 1;
        $('select').selectpicker({
            language: "{{ App::getLocale() }}"
        });
        $('form').on('submit', function() {
            $("#athlete-select").removeAttr('disabled');
        });
         $(document).on('click', '.add-exercise', function() {
            var day = $(this).parent().data('day');
            var exercise = $(this).prev().data('exercise');
            exercise++;
            $('<div class="panel panel-default exercise-panel" data-exercise="' + exercise + '"><div class="panel-heading">@lang('messages.Exercise') ' + exercise + ' <button type="button" class="btn btn-danger btn-xs remove-item"><i class="fa fa-times"></i></button></div><div class="panel-body"><div class="form-group"><label class="col-sm-1 control-label">@lang('messages.Exercise')</label> <div class="col-sm-4"> <select name="workoutExercises[' + day + '][' + exercise + '][exercise_id]" class="selectpicker" data-live-search="true"> @foreach($exercises as $exercise) <option value="{{$exercise->id}}">{{$exercise->name}}</option> @endforeach </select> </div><label class="col-sm-1 control-label">@lang('messages.Technique')</label> <div class="col-sm-4"> <select name="workoutExercises[' + day + '][' + exercise + '][exercise_technique_id]" class="selectpicker" data-live-search="true"><option label=" "></option>@foreach($exerciseTechniques as $technique) <option value="{{$technique->id}}">{{$technique->name}}</option> @endforeach </select> </div></div><div class="form-group"> <label class="col-sm-1 control-label">@lang('messages.Sets')</label> <div class="col-sm-2"> <input name="workoutExercises[' + day + '][' + exercise + '][sets]" type="text" class="form-control"> </div><label class="col-sm-1 control-label">@lang('messages.Reps')</label> <div class="col-sm-2"> <input name="workoutExercises[' + day + '][' + exercise + '][reps]" type="text" class="form-control"> </div><label class="col-sm-1 control-label">@lang('messages.Rest')</label> <div class="col-sm-2"> <input name="workoutExercises[' + day + '][' + exercise + '][rest]" type="text" class="form-control"> </div></div><div class="form-group"> <label class="col-sm-2 control-label">@lang('messages.Notes')</label> <div class="col-sm-12"> <textarea name="workoutExercises[' + day + '][' + exercise + '][notes]" class="form-control"></textarea> </div></div></div></div>')
                .insertBefore($(this));
            $('select').selectpicker({
                language: "{{ App::getLocale() }}"
            });
        });
        $('#add-day').on('click', function() {
            days++;
            $('<div class="panel panel-default workout-day mt"> <div class="panel-heading"> @lang('messages.Day') ' + days + ' <button type="button" class="btn btn-danger btn-xs remove-item"><i class="fa fa-times"></i></button></div><div class="panel-body" data-day="' + days + '"> <div class="panel panel-default exercise-panel" data-exercise="1"> <div class="panel-heading">@lang('messages.Exercise') 1</div><div class="panel-body"> <div class="form-group"> <label class="col-sm-1 control-label">@lang('messages.Exercise')</label> <div class="col-sm-4"> <select name="workoutExercises[' + days + '][0][exercise_id]" class="selectpicker" data-live-search="true"> @foreach($exercises as $exercise) <option value="{{$exercise->id}}">{{$exercise->name}}</option> @endforeach </select> </div><label class="col-sm-1 control-label">@lang('messages.Technique')</label> <div class="col-sm-4"> <select name="workoutExercises[' + days + '][0][exercise_technique_id]" class="selectpicker" data-live-search="true"><option label=" "></option>@foreach($exerciseTechniques as $technique) <option value="{{$technique->id}}">{{$technique->name}}</option> @endforeach </select> </div></div><div class="form-group"> <label class="col-sm-1 control-label">@lang('messages.Sets')</label> <div class="col-sm-2"> <input name="workoutExercises[' + days + '][0][sets]" type="text" class="form-control"> </div><label class="col-sm-1 control-label">@lang('messages.Reps')</label> <div class="col-sm-2"> <input name="workoutExercises[' + days + '][0][reps]" type="text" class="form-control"> </div><label class="col-sm-1 control-label">@lang('messages.Rest')</label> <div class="col-sm-2"> <input name="workoutExercises[' + days + '][0][rest]" type="text" class="form-control"> </div></div><div class="form-group"> <label class="col-sm-2 control-label">@lang('messages.Notes')</label> <div class="col-sm-12"> <textarea name="workoutExercises[' + days + '][0][notes]" class="form-control"></textarea> </div></div></div></div><button type="button" class="btn btn-default pull-right add-exercise">@lang('messages.AddExercise')</button> </div></div>')
                .insertBefore($('#predefined-workout'));
            $('select').selectpicker({
                language: "{{ App::getLocale() }}"
            });
        });
        $("#pw-toggle").on('click', function() {
            $(this).toggleClass('active');
            $('#nw-toggle').removeClass('active');
            $("#predefined-workout").slideToggle();
            $("#workout-day-1").hide();
            if ($(this).hasClass('active'))
                $("#workout-create-submit").show();
            else 
                $("#workout-create-submit").hide();
            $("#add-day").hide();
            if ($(this).hasClass('active')) {
                $('#athlete-select, #start-date, #end-date, #workout-select').prop('required', true);
                $('input[name="sets"], input[name="reps"], input[name="rest"]').prop('required', false);
            }
            else {
                $('#athlete-select, #start-date, #end-date, #workout-select').prop('required', false);
            }
        });
        $("#nw-toggle").on('click', function() {
            $(this).toggleClass('active');
            $('#pw-toggle').removeClass('active');
            $("#workout-day-1").slideToggle();
            $("#predefined-workout").hide();
            if ($(this).hasClass('active'))
                $("#workout-create-submit").show();
            else 
                $("#workout-create-submit").hide();
            $("#add-day").slideToggle()
            
            if ($(this).hasClass('active')) {
                $('input[name*="sets"], input[name*="reps"], input[name*="rest"]').prop('required', true);
                $('#athlete-select, #start-date, #end-date, #workout-select').prop('required', false);
            }
            else {
                $('input[name="sets"], input[name="reps"], input[name="rest"]').prop('required', false);
            }
        });
        $(document).on('click', ".remove-item", function(e) {
           $(this).parent().parent().fadeOut(1000, function() {$(this).remove()});
        });
    });
</script>
@endpush