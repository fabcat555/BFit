@extends('layouts.master')

@section('sidebar')
    @include('instructor.sidebar')
@endsection

@section('topbar')
    @include('instructor.topbar')
@endsection 

@section('title', __('messages.InstructorDashboard'))
 
@section('content')
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <!-- First row -->
                <div class="row mt">
                    <div class="col-md-12 col-lg-6 mb">
                         <!-- PERSONAL PANEL -->
                        <div class="white-panel pn personal-panel">
                            <div class="white-header">
                                <h5 class="personal-data-heading">@lang('messages.PersonalData')</h5>
                            </div>
                            <table class="table table-borderless table-personal">
                                <tbody>
                                    <tr>
                                        <th scope="row">@lang('messages.FirstName')</th>
                                        <td>{{ $instructor->first_name }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">@lang('messages.LastName')</th>
                                        <td>{{ $instructor->last_name }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">@lang('messages.BirthDate')</th>
                                        <td>{{ $instructor->birth_date->format('d/m/y') }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">@lang('messages.Email')</th>
                                        <td>{{ $instructor->email }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">@lang('messages.MembershipStartDate')</th>
                                        <td>{{ $instructor->created_at->format('d/m/y') }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6 mb">
                        <!-- ATHLETES PANEL -->
                        <div class="white-panel pn membership-panel">
                            <div class="white-header">
                                <h5 class="panel-header">@lang('messages.AssignedAthletes')</h5>
                                <div class="db-btn-group">
                                    <a href="{{route('instructor.athletes.create', ['instructor' => Auth::guard('instructor')->user()])}}" class="btn btn-primary btn-xs dashboard-btn">
                                    @lang('messages.New')
                                </a>
                                    <a href="{{route('instructor.athletes.index', ['instructor' => Auth::guard('instructor')->user()])}}" class="btn btn-primary btn-xs dashboard-btn">
                                    @lang('messages.ViewAll')
                                </a>
                                </div>
                            </div>
                            @if(count($instructor->athletes))
                            <table class="table table-hover table-workout">
                                <thead>
                                    <tr>
                                        <th>@lang('messages.Athlete')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($instructor->athletes as $athlete)
                                    <tr>
                                        <td>{{$athlete->first_name}} {{$athlete->last_name}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @else
                                <h5>@lang('messages.NoAthletesAssigned')</h5>
                            @endif
                        </div>
                    </div>
                    <!-- /col-md-6 -->
                </div>
                <!-- /row -->
                <!-- Second row -->
                <div class="row mt">
                    <div class="col-md-12 col-lg-6 mb">
                        <!-- EXERCISES PANEL -->
                        <div class="white-panel pn personal-panel">
                            <div class="white-header">
                                <h5 class="personal-data-heading panel-header">@lang('messages.ExercisesHeading')</h5>
                                <div class="db-btn-group">
                                    <a href="{{route('exercises.create')}}" class="btn btn-primary btn-xs dashboard-btn">
                                        @lang('messages.New')
                                    </a>
                                    <a href="{{route('exercises.index')}}" class="btn btn-primary btn-xs dashboard-btn">
                                        @lang('messages.ViewAll')
                                    </a>
                                </div>
                            </div>
                            @if(isset($exercises))
                            <table class="table table-hover table-workout">
                                <thead>
                                    <tr>
                                        <th>@lang('messages.Exercise')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($exercises as $exercise)
                                    <tr>
                                        <td>{{$exercise->name}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @else
                                <h5>@lang('messages.NoExercises')</h5>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6 mb">
                        <!-- PREDEFINED WORKOUTS PANEL -->
                        <div class="white-panel pn membership-panel">
                            <div class="white-header">
                                <h5 class="panel-header">@lang('messages.PredefinedWorkouts')</h5>
                                <div class="db-btn-group">
                                    <a href="{{route('workouts.create')}}" class="btn btn-primary btn-xs dashboard-btn">
                                    @lang('messages.New')
                                </a>
                                    <a href="{{route('workouts.index')}}" class="btn btn-primary btn-xs dashboard-btn">
                                    @lang('messages.ViewAll')
                                </a>
                                </div>
                            </div>
                            @if(isset($workouts))
                            <table class="table table-hover table-workout">
                                <thead>
                                    <tr>
                                        <th>@lang('messages.Workout')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($workouts as $workout)
                                    <tr>
                                        <td>{{$workout->name}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @else
                                <h5>@lang('messages.NoWorkouts')</h5>
                            @endif
                        </div>
                    </div>
                    <!-- /col-md-6 -->
                </div>
                <!-- /row -->
                <!-- Third row -->
                <div class="row mt">
                    <div class="col-md-12 col-lg-6 mb">
                        <!-- WORKOUT TYPES PANEL -->
                        <div class="white-panel pn personal-panel">
                            <div class="white-header">
                                <h5 class="personal-data-heading panel-header">@lang('messages.WorkoutTypesHeading')</h5>
                                <div class="db-btn-group">
                                    <a href="{{route('workout-types.create')}}" class="btn btn-primary btn-xs dashboard-btn">
                                    @lang('messages.New')
                                </a>
                                    <a href="{{route('workout-types.index')}}" class="btn btn-primary btn-xs dashboard-btn">
                                    @lang('messages.ViewAll')
                                </a>
                                </div>
                            </div>
                            @if (isset($workoutTypes))
                            <table class="table table-hover table-workout">
                                <thead>
                                    <tr>
                                        <th>@lang('messages.WorkoutType')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($workoutTypes as $wt)
                                    <tr>
                                        <td>{{$wt->name}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @else
                                <h5>@lang('messages.NoWorkoutTypes')</h5>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6 mb">
                        <!-- EXERCISE TECHNIQUES PANEL -->
                        <div class="white-panel pn membership-panel">
                            <div class="white-header">
                                <h5 class="panel-header">@lang('messages.ExerciseTechniques')</h5>
                                <div class="db-btn-group">
                                    <a href="{{route('exercise-techniques.create')}}" class="btn btn-primary btn-xs dashboard-btn">
                                        @lang('messages.New')
                                    </a>
                                    <a href="{{route('exercise-techniques.index')}}" class="btn btn-primary btn-xs dashboard-btn">
                                        @lang('messages.ViewAll')
                                    </a>
                                </div>
                            </div>
                            @if (isset($exerciseTechniques))
                            <table class="table table-hover table-workout">
                                <thead>
                                    <tr>
                                        <th>@lang('messages.Technique')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($exerciseTechniques as $et)
                                    <tr>
                                        <td>{{$et->name}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @else
                                <h5>@lang('messages.NoTechniques')</h5>
                            @endif
                        </div>
                    </div>
                    <!-- /col-md-6 -->
                </div>
                <!-- /row -->
            </div>
            <!-- /col-lg-12 END SECTION MIDDLE -->
        </div>
    </section>
</section>
@endsection