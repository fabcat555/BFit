@extends('layouts.master')

@section('sidebar')
    @include('instructor.sidebar')
@endsection
 
@section('topbar')
    @include('instructor.topbar')
@endsection
 
@section('title', __('messages.WorkoutEdit'))

@section('content')
<section id="main-content">
    <section class="wrapper site-min-height">
        <h3 class="bm-section-heading">
            <i class="fa fa-angle-right"></i> @lang('messages.EditWorkout')
        </h3>
        <!-- page start-->
        <div class="row mt">
            <div class="col-lg-12">
                <div class="form-panel">
                @include('shared.errors')
                    <form class="form-horizontal style-form" method="post" action="{{route('workouts.update', $workout->id)}}">
                        @csrf {{ method_field('put') }}
                        <div class="form-group">
                            <label class="col-md-1 control-label">@lang('messages.Name')</label>
                            <div class="col-md-4">
                                <input name="name" required value="{{$workout->name}}" type="text" class="form-control">
                            </div>
                        </div>
                        @foreach($workout->workoutExercises->groupBy('day') as $day => $workoutExercises)
                        <div class="panel panel-danger workout-day mt">
                            <div class="panel-heading">
                                @lang('messages.Day') {{$day}}
                            </div>
                            <div class="panel-body" data-day="{{$day}}">
                                @foreach($workoutExercises as $key => $workoutExercise)
                                <div id="wo-exercise-{{$workoutExercise->id}}" class="panel panel-default exercise-panel" data-exercise="{{$key+1}}">
                                    <div class="panel-heading">
                                        @lang('messages.Exercise') {{$key + 1}}
                                        <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#confirm-delete-modal" data-resource-id="{{$workoutExercise->id}}"><i class="fa fa-times"></i></button>
                                    </div>
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <input type="hidden" name="workoutExercises[{{$day}}][{{$key}}][workout_exercise_id]" value="{{$workoutExercise->id}}">
                                            <label class="col-md-1 control-label">@lang('messages.Exercise')</label>
                                            <div class="col-md-4">
                                                <select name="workoutExercises[{{$day}}][{{$key}}][exercise_id]" class="selectpicker" data-live-search="true" data-width="100%">
                                                    @foreach($exercises as $exercise)
                                                        <option @if($workoutExercise->exercise->id == $exercise->id) selected @endif value="{{$exercise->id}}">{{$exercise->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <label class="col-md-1 control-label label-mt">@lang('messages.Technique')</label>
                                            <div class="col-md-4">
                                                <select name="workoutExercises[{{$day}}][{{$key}}][exercise_technique_id]" class="selectpicker" data-live-search="true" data-width="100%">
                                                    <option value=" "></option>
                                                    @foreach($exerciseTechniques as $technique)
                                                        <option @isset($workoutExercise->exerciseTechnique) @if($workoutExercise->exerciseTechnique->id == $technique->id) selected @endif @endisset value="{{$technique->id}}">{{$technique->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-1 control-label">@lang('messages.Sets')</label>
                                            <div class="col-md-2">
                                                <input name="workoutExercises[{{$day}}][{{$key}}][sets]" value="{{$workoutExercise->sets}}" type="text" class="form-control">
                                            </div>
                                            <label class="col-md-1 control-label label-mt">@lang('messages.Reps')</label>
                                            <div class="col-md-2">
                                                <input name="workoutExercises[{{$day}}][{{$key}}][reps]" value="{{$workoutExercise->reps}}" type="text" class="form-control">
                                            </div>
                                            <label class="col-md-1 control-label label-mt">@lang('messages.Rest')</label>
                                            <div class="col-md-2">
                                                <input name="workoutExercises[{{$day}}][{{$key}}][rest]" value="{{$workoutExercise->rest}}" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">@lang('messages.Notes')</label>
                                            <div class="col-md-12">
                                                <textarea name="workoutExercises[{{$day}}][{{$key}}][notes]" value="{{$workoutExercise->notes}}" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <button type="button" class="btn btn-default pull-right add-exercise">@lang('messages.AddExercise')</button>
                            </div>
                        </div>
                        @endforeach
                        <button id="workout-edit-submit" type="submit" class="btn btn-primary pull-right">@lang('messages.Register')</button>
                        <button id="add-wo-day" type="button" class="btn btn-default pull-left">@lang('messages.AddWorkoutDay')</button>
                        <div style="clear: both;"></div>
                    </form>
                </div>
            </div>
            <!-- col-lg-12-->
        </div>
        <!-- page end-->
    </section>
</section>
<!-- Modal -->
<div id="confirm-delete-modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">@lang('messages.DeleteConfirmModalHeader')</h4>
            </div>
            <div class="modal-body">
                <p>@lang('messages.DeleteConfirmModalBody')</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">@lang('messages.CloseModal')</button>
                <button id="modal-confirm" type="button" class="btn btn-danger">@lang('messages.ConfirmModal')</button>
            </div>
        </div>
    </div>
</div>
@endsection
 
@push('script')
<script>
    $(document).ready(function() {
        var days = parseInt("{{count($workout->workoutExercises->groupBy('day'))}}");

        $('#add-wo-day').on('click', function() {
            days++;
            $('<div class="panel panel-danger workout-day mt"> <div class="panel-heading"> @lang('messages.Day') ' + days + '</div><div class="panel-body" data-day="' + days + '"> <div class="panel panel-default exercise-panel" data-exercise="1"> <div class="panel-heading">@lang('messages.Exercise') 1</div><div class="panel-body"> <div class="form-group"> <label class="col-md-1 control-label">@lang('messages.Exercise')</label> <div class="col-md-4"> <select name="workoutExercises[' + days + '][0][exercise_id]" class="selectpicker" data-live-search="true" data-width="100%"> @foreach($exercises as $exercise) <option value="{{$exercise->id}}">{{$exercise->name}}</option> @endforeach </select> </div><label class="col-md-1 control-label label-mt">@lang('messages.Technique')</label> <div class="col-md-4"> <select name="workoutExercises[' + days + '][0][exercise_technique_id]" class="selectpicker" data-live-search="true" data-width="100%"><option label=" "></option>@foreach($exerciseTechniques as $technique) <option value="{{$technique->id}}">{{$technique->name}}</option> @endforeach </select> </div></div><div class="form-group"> <label class="col-md-1 control-label">@lang('messages.Sets')</label> <div class="col-md-2"> <input name="workoutExercises[' + days + '][0][sets]" type="text" class="form-control"> </div><label class="col-md-1 control-label label-mt">@lang('messages.Reps')</label> <div class="col-md-2"> <input name="workoutExercises[' + days + '][0][reps]" type="text" class="form-control"> </div><label class="col-md-1 control-label label-mt">@lang('messages.Rest')</label> <div class="col-md-2"> <input name="workoutExercises[' + days + '][0][rest]" type="text" class="form-control"> </div></div><div class="form-group"> <label class="col-md-2 control-label">@lang('messages.Notes')</label> <div class="col-md-12"> <textarea name="workoutExercises[' + days + '][0][notes]" class="form-control"></textarea> </div></div></div></div><button type="button" class="btn btn-default pull-right add-exercise">@lang('messages.AddExercise')</button> </div></div>')
                .insertBefore($('#workout-edit-submit'));
            $('select').selectpicker({
                language: "{{ App::getLocale() }}"
            });
        });
        $(document).on('click', '.add-exercise', function() {
            var day = $(this).parent().data('day');
            var exercise = $(this).prev().data('exercise');
            exercise++;
            $('<div class="panel panel-default exercise-panel" data-exercise="' + exercise + '"><div class="panel-heading"> @lang('messages.Exercise') ' + (exercise) + ' <button type="button" class="btn btn-danger btn-xs remove-item"><i class="fa fa-times"></i></button> </div><div class="panel-body"><div class="form-group"><label class="col-md-1 control-label">@lang('messages.Exercise')</label> <div class="col-md-4"> <select name="workoutExercises[' + day + '][' + exercise + '][exercise_id]" class="selectpicker" data-live-search="true" data-width="100%"> @foreach($exercises as $exercise) <option value="{{$exercise->id}}">{{$exercise->name}}</option> @endforeach </select> </div><label class="col-md-1 control-label label-mt">@lang('messages.Technique')</label> <div class="col-md-4"> <select name="workoutExercises[' + day + '][' + exercise + '][exercise_technique_id]" class="selectpicker" data-live-search="true" data-width="100%"><option value=" "></option>@foreach($exerciseTechniques as $technique) <option value="{{$technique->id}}">{{$technique->name}}</option> @endforeach </select> </div></div><div class="form-group"> <label class="col-md-1 control-label">@lang('messages.Sets')</label> <div class="col-md-2"> <input name="workoutExercises[' + day + '][' + exercise + '][sets]" type="text" class="form-control"> </div><label class="col-md-1 control-label label-mt">@lang('messages.Reps')</label> <div class="col-md-2"> <input name="workoutExercises[' + day + '][' + exercise + '][reps]" type="text" class="form-control"> </div><label class="col-md-1 control-label label-mt">@lang('messages.Rest')</label> <div class="col-md-2"> <input name="workoutExercises[' + day + '][' + exercise + '][rest]" type="text" class="form-control"> </div></div><div class="form-group"> <label class="col-md-2 control-label">@lang('messages.Notes')</label> <div class="col-md-12"> <textarea name="workoutExercises[' + day + '][' + exercise + '][notes]" class="form-control"></textarea> </div></div></div></div>')
                .insertBefore($(this));
            $('select').selectpicker({
                language: "{{ App::getLocale() }}"
            });
        });
        var modal = $('#confirm-delete-modal');
        modal.on('show.bs.modal', function(e) {
            $('#modal-confirm').data('resource-id', $(e.relatedTarget).data('resource-id'));
        });
        $(document).on('click', "#modal-confirm", function(e) {
            var resourceId = $(this).data('resource-id');
            $.ajax({
                type: "post",
                data: {
                    _method: "DELETE"
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/workout-exercises/" + resourceId,
                success: function() {
                    $('#wo-exercise-' + resourceId).fadeOut(1000, function() {$(this).remove()});
                    modal.modal('hide');
                }
            });
        });
        $(document).on('click', ".remove-item", function(e) {
           $(this).parent().parent().fadeOut(1000, function() {$(this).remove()});
        });
});
</script>
@endpush