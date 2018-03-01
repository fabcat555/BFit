@extends('layouts.master') 
@section('sidebar')
    @include('athlete.sidebar')
@endsection
 
@section('content')
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12 main-chart">
                <div class="row">
                    @foreach ($workouts as $wo)
                    <div class="col-md-12 col-lg-6 mb">
                        <!-- WORKOUT PANEL -->
                        <div class="grey-panel pn">
                            <div class="grey-header">
                                <h5 class="black-heading">@lang('messages.AssignedWorkout')</h5>
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
                            <table class="table table-hover table-workout">
                                <thead>
                                    <tr>
                                        <th>@lang('messages.Exercise')</th>
                                        <th>@lang('messages.Sets')</th>
                                        <th>@lang('messages.Reps')</th>
                                        <th>@lang('messages.Rest')</th>
                                        <th>@lang('messages.Technique')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($wo->workoutExercises as $woExercise)
                                    <tr>
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
                                </tbody>
                            </table>
                            <br>
                        </div>
                    </div>
                    @endforeach
                    <!-- /col-md-12 -->
                </div>
                <!-- /row -->
            </div>
            <!-- /col-lg-12 END SECTION MIDDLE -->
        </div>
    </section>
</section>
@endsection