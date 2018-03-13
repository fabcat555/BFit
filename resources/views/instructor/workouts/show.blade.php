@extends('layouts.master') 
@section('sidebar')
    @include('instructor.sidebar')
@endsection
 
@section('topbar')
    @include('instructor.topbar')
@endsection
 
@section('title', __('messages.WorkoutShow')) 
@section('content')
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12 main-chart">
                <div class="row">
                    <div class="col-md-12 mb">
                        <!-- WORKOUT PANEL -->
                        <div class="grey-panel pn">
                            <div class="grey-header">
                                <h5 class="panel-header">@lang('messages.Workout')</h5>
                                <div class="db-btn-group">
                                    <button class="btn btn-primary btn-xs dashboard-btn" data-toggle="modal" data-target="#assign-workout-modal">
                                        @lang('messages.WorkoutAssign')
                                    </button>
                                </div>
                            </div>
                            @if(session('status'))
                            <div class="alert alert-success alert-created" role="alert">
                                <strong>{{ session('status') }}</strong>
                            </div>
                            @endif
                            <table class="table table-borderless table-description">
                                <tbody>
                                    <tr>
                                        <th scope="row">@lang('messages.Type')</th>
                                        <td>
                                            @if(isset($workout->type)) {{ $workout->type->name }} @else - @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">@lang('messages.StartDate')</th>
                                        <td>
                                            @if(isset($workout->start_date)) {{ $workout->start_date->format('d/m/y') }} @else - @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">@lang('messages.EndDate')</th>
                                        <td>
                                            @if(isset($workout->end_date)) {{ $workout->end_date->format('d/m/y') }} @else - @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table id="workout" class="table table-hover table-workout">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>@lang('messages.Exercise')</th>
                                        <th>@lang('messages.Sets')</th>
                                        <th>@lang('messages.Reps')</th>
                                        <th>@lang('messages.Rest')</th>
                                        <th>@lang('messages.Technique')</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($workoutDays as $day => $exercises)
                                    <tr>
                                        <th colspan="7" scope="colgroup">
                                            @lang('messages.Day') {{$day}}
                                        </th>
                                        <th style="display: none;"></th>
                                        <th style="display: none;"></th>
                                        <th style="display: none;"></th>
                                        <th style="display: none;"></th>
                                        <th style="display: none;"></th>
                                        <th style="display: none;"></th>
                                    </tr>
                                    @foreach($exercises as $key => $woExercise)
                                    <tr id="wo-exercise-{{$woExercise->id}}">
                                        <td>{{$key+1}}</td>
                                        <td>
                                            <a href="{{route('exercises.show', ['id' => $woExercise->exercise->id])}}">{{$woExercise->exercise->name}}</a>
                                        </td>
                                        <td>{{$woExercise->sets}}</td>
                                        <td>{{$woExercise->reps}}</td>
                                        <td>{{$woExercise->rest}}</td>
                                        <td>
                                            @if (isset($woExercise->exerciseTechnique))
                                            <a href="{{route('exercise-techniques.show', ['technique' => $woExercise->exerciseTechnique->id])}}">
                                                {{$woExercise->exerciseTechnique->name}}
                                            </a> @else - @endif
                                        </td>
                                        <td>
                                            <button data-toggle="modal" data-target="#confirm-delete-modal" data-resource-id="{{$woExercise->id}}" class="btn btn-danger btn-xs"> 
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach 
                                    @endforeach
                                </tbody>
                            </table>
                            <br>
                        </div>
                    </div>
                    <!-- /col-md-12 -->
                </div>
                <!-- /row -->
            </div>
            <!-- /col-lg-12 END SECTION MIDDLE -->
        </div>
    </section>
</section>
<!-- Modals -->
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
<div id="assign-workout-modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">@lang('messages.WorkoutAssignModalTitle')</h4>
            </div>
            <form action="{{route('workout.assign')}}" method="POST">
                @csrf
                <input type="hidden" name="workout_id" value="{{$workout->id}}">
                <div class="modal-body">
                    <p>@lang('messages.WorkoutAssignModalBody')</p>
                    <select name="athlete_id" class="selectpicker">
                    @foreach(Auth::guard('instructor')->user()->athletes as $athlete)
                        <option value="{{$athlete->id}}">{{$athlete->first_name}} {{$athlete->last_name}}</option>
                    @endforeach
                </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">@lang('messages.CloseModal')</button>
                    <button id="modal-confirm" type="submit" class="btn btn-primary">@lang('messages.ConfirmModal')</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
 
@push('script')
<script>
    $(document).ready(function() {
        var workoutTable = $('.table-workout').DataTable( {
            ordering: false,
            info: false,
            paging: false,
            lengthChange: false,
            searching: false,
            buttons: [
                'copy', 'excel', 'pdf'
            ],
            initComplete: function () {
                setTimeout( function () {
                    workoutTable.buttons().container().appendTo( $('.col-sm-6:eq(1) ') );
                }, 10 );
            }
        });
        var modal = $('#confirm-delete-modal');
        modal.on('show.bs.modal', function(e) {
            $('#modal-confirm').data('resource-id', $(e.relatedTarget).data('resource-id'));
        });
        $('#modal-confirm').on('click', function(e) {
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
});
</script>
@endpush