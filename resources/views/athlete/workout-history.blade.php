@extends('layouts.master') 

@section('sidebar')
    @include('athlete.sidebar')
@endsection

@section('topbar')
    @include('athlete.topbar')
@endsection

@section('title', __('messages.WorkoutHistoryShow'))
 
@section('content')
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12 main-chart">
                <div class="row">
                    @if (!$workouts->isEmpty())
                        @foreach ($workouts as $woKey => $wo)
                        <div class="col-md-12 mb">
                            <!-- WORKOUT PANEL -->
                            <div class="grey-panel pn">
                            <div class="{{$woKey%2 ? 'panel-header-black' : 'panel-header-red'}}">
                                    <h5 class="panel-header">{{$wo->name}}</h5>
                                </div>
                                <table class="table table-borderless table-description">
                                    <tbody>
                                        <tr>
                                            <th scope="row">@lang('messages.Type')</th>
                                            <td>{{ $wo->type->name }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">@lang('messages.StartDate')</th>
                                            <td>{{ $wo->start_date->format('d/m/y') }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">@lang('messages.EndDate')</th>
                                            <td>{{ $wo->end_date->format('d/m/y') }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table id="workout-{{$woKey+1}}" class="table table-hover table-workout">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>@lang('messages.Exercise')</th>
                                            <th>@lang('messages.Sets')</th>
                                            <th>@lang('messages.Reps')</th>
                                            <th>@lang('messages.Rest')</th>
                                            <th>@lang('messages.Technique')</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($wo->workoutExercises->groupBy('day') as $day => $woExercises)
                                            <tr>
                                                <th colspan="6" scope="colgroup">
                                                    @lang('messages.Day') {{$day}}
                                                </th>
                                                <th style="display: none;"></th>
                                                <th style="display: none;"></th>
                                                <th style="display: none;"></th>
                                                <th style="display: none;"></th>
                                                <th style="display: none;"></th>
                                            </tr>
                                        @foreach ($woExercises as $key => $woExercise)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$woExercise->exercise->name}}</td>
                                            <td>{{$woExercise->sets}}</td>
                                            <td>{{$woExercise->reps}}</td>
                                            <td>{{$woExercise->rest}}</td>
                                            <td>
                                                @if (isset($woExercise->exerciseTechnique)) 
                                                    {{$woExercise->exerciseTechnique->name}} 
                                                @else 
                                                    - 
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                        @endforeach
                                    </tbody>
                                </table>
                                <br>
                            </div>
                        </div>
                        @endforeach
                    @else
                        <h5>@lang('messages.NoWorkouts')</h5>
                    @endif
                    <!-- /col-md-12 -->
                </div>
                <!-- /row -->
            </div>
            <!-- /col-lg-12 END SECTION MIDDLE -->
        </div>
    </section>
</section>
@endsection

@push('script')
<script>
    var workouts = {{count($workouts)}};

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
                    for (var i = 0; i < workouts; i++)
                        $('#workout-' + (i+1)).DataTable().buttons().container().appendTo( $('#workout-' + (i+1) + '_wrapper .col-sm-6:eq(1)') ); 
                });
            }
        });
});
</script>
@endpush