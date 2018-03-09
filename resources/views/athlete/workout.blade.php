@extends('layouts.master')
 
@section('sidebar')
    @include('athlete.sidebar')
@endsection

@section('topbar')
    @include('athlete.topbar')
@endsection
 
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
                                <h5 class="black-heading">@lang('messages.AssignedWorkout')</h5>
                            </div>
                            <table class="table table-borderless table-description">
                                <tbody>
                                    <tr>
                                        <th scope="row">@lang('messages.Type')</th>
                                        <td>{{ $workout->type->name }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">@lang('messages.StartDate')</th>
                                        <td>{{ $workout->start_date->format('d/m/y') }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">@lang('messages.EndDate')</th>
                                        <td>{{ $workout->end_date->format('d/m/y') }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-hover table-workout">
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
                                            <tr>
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
                                                    <a href="{{ route('progress.show', ['exercise' => $woExercise->id]) }}" class="btn btn-warning btn-xs"><i class="fa fa-bar-chart-o"></i></a>
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
            ]
        });
        workoutTable.buttons().container().appendTo( $('.col-sm-6:eq(1) ') );
});
</script>
@endpush