@extends('layouts.master') 
@section('sidebar')
    @include('instructor.sidebar')
@endsection
@section('topbar')
    @include('instructor.topbar')
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
                    <form class="form-horizontal style-form" method="post" action="{{route('workouts.store')}}">
                        <div class="panel panel-default">
                            <div class="panel-heading">@lang('messages.WorkoutData')</div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label class="col-sm-1 control-label">@lang('messages.Name')</label>
                                    <div class="col-sm-2">
                                        <input name="name" type="text" required class="form-control">
                                    </div>
                                    <label class="col-sm-1 control-label">@lang('messages.Athlete')</label>
                                    <div class="col-sm-2">
                                        <select class="selectpicker" data-live-search="true" name="athlete_id">
                                            <option label=" "></option>
                                            @foreach($athletes as $athlete)
                                            <option value="{{$athlete->id}}">{{$athlete->first_name}} {{$athlete->last_name}}</option>
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
                                        <input name="start_date" type="date" class="form-control">
                                    </div>
                                    <label class="col-sm-1 control-label">@lang('messages.EndDate')</label>
                                    <div class="col-sm-3">
                                        <input name="end_date" type="date" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        @csrf
                        <div id="athlete-form" class="panel panel-default">
                            <div class="panel-heading">@lang('messages.Workout')</div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label class="col-sm-1 control-label">@lang('messages.Exercise')</label>
                                    <div class="col-sm-4">
                                        <select name="workoutExercises[0][exercise_id]" class="selectpicker" data-live-search="true">
                                            @foreach($exercises as $exercise)
                                            <option value="{{$exercise->id}}">{{$exercise->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <label class="col-sm-1 control-label">@lang('messages.Technique')</label>
                                    <div class="col-sm-4">
                                        <select name="workoutExercises[0][exercise_technique_id]" required class="selectpicker" data-live-search="true">
                                            @foreach($exerciseTechniques as $technique)
                                            <option value="{{$technique->id}}">{{$technique->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-1 control-label">@lang('messages.Sets')</label>
                                    <div class="col-sm-2">
                                        <input name="workoutExercises[0][sets]" required type="text" class="form-control">
                                    </div>
                                    <label class="col-sm-1 control-label">@lang('messages.Reps')</label>
                                    <div class="col-sm-2">
                                        <input name="workoutExercises[0][reps]" required type="text" class="form-control">
                                    </div>
                                    <label class="col-sm-1 control-label">@lang('messages.Rest')</label>
                                    <div class="col-sm-2">
                                        <input name="workoutExercises[0][rest]" required type="text" class="form-control">
                                    </div>
                                    <input type="hidden" name="workoutExercises[0][day]" value="1">
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">@lang('messages.Notes')</label>
                                    <div class="col-sm-12">
                                        <textarea name="workoutExercises[0][notes]" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
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

@push('script')
    <script>
    $(function () {
        $('select').selectpicker({
            language: {{App::getLocale()}}
        })
    });
    </script>
@endpush