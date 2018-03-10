@extends('layouts.master') 

@section('sidebar')
    @include('athlete.sidebar')
@endsection

@section('topbar')
    @include('athlete.topbar')
@endsection

@section('title', __('messages.AthleteDashboard'))
 
@section('content')
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <!-- First row -->
                <div class="row mt">
                    <div class="col-md-12 col-lg-6 mb">
                        <!-- PERSONAL DATA PANEL -->
                        <div class="white-panel pn personal-panel">
                            <div class="white-header">
                                <h5 class="personal-data-heading ">@lang('messages.PersonalData')</h5>
                            </div>
                            <table class="table table-borderless table-personal">
                                <tbody>
                                    <tr>
                                        <th scope="row">@lang('messages.FirstName')</th>
                                        <td>{{ $athlete->first_name }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">@lang('messages.LastName')</th>
                                        <td>{{ $athlete->last_name }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">@lang('messages.BirthDate')</th>
                                        <td>{{ $athlete->birth_date->format('d/m/y') }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">@lang('messages.Gender')</th>
                                        <td>{{ $athlete->gender }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">@lang('messages.Height')</th>
                                        <td>{{ $athlete->height }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6 mb">
                        <!-- MEMBERSHIP PANEL -->
                        <div class="white-panel pn membership-panel">
                            <div class="white-header">
                                <h5 class="">@lang('messages.MembershipHeading')</h5>
                            </div>
                            @if(isset($membership))
                            <table class="table table-borderless table-description">
                                <tbody>
                                    <tr>
                                        <th scope="row">@lang('messages.Type')</th>
                                        <td>{{ $membership->type->name }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">@lang('messages.MembershipStatus')</th>
                                        <td>{{ $membership->end_date > Carbon\Carbon::now() ? __('messages.Active') : __('messages.Expired') }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">@lang('messages.MembershipValidity')</th>
                                        <td>{{ $membership->end_date->format('d/m/y') }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">@lang('messages.Instructor')</th>
                                        <td>
                                            @if (isset($athlete->instructor)) 
                                                {{ $athlete->instructor->first_name . ' ' . $athlete->instructor->last_name }} 
                                            @else 
                                                -
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            @else
                                <h5>@lang('messages.NoMembership')</h5>
                            @endif
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="small mt">@lang('messages.MembershipStartYear')</p>
                                    <p>{{ $athlete->created_at->year }}</p>
                                </div>
                                <div class="col-md-6">
                                    <p class="small mt">@lang('messages.MembershipCost')</p>
                                    <p>
                                        @if (isset($athlete->instructor)) 
                                            $ {{ $membership->type->price }}
                                        @else 
                                            -
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /col-md-6 -->
                </div>
                <!-- /row -->
                <!-- Second row -->
                <div class="row mt">
                    <!-- /col-md-4 -->
                    <div class="col-md-12 col-lg-6 mb">
                        <!-- WORKOUT PANEL -->
                        <div class="grey-panel pn workout-panel">
                            <div class="grey-header">
                                <h5 class="panel-header">@lang('messages.AssignedWorkoutHeading')</h5>
                                @isset($workout)
                                <div class="db-btn-group">
                                    <a href="{{route('workout.history')}}" class="btn btn-primary btn-xs dashboard-btn">
                                        @lang('messages.ViewHistory')
                                    </a>
                                    <a href="{{route('workout')}}" class="btn btn-primary btn-xs dashboard-btn">
                                        @lang('messages.ViewAll')
                                    </a>
                                </div>
                                @endisset
                            </div>
                            @if (isset($workout))
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
                            <h5>@lang('messages.Day') 1</h5>
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
                                    @foreach ($workoutDays[1] as $woExercise)
                                    <tr>
                                        <td>{{$woExercise->exercise->name}}</td>
                                        <td>{{$woExercise->sets}}</td>
                                        <td>{{$woExercise->reps}}</td>
                                        <td>{{$woExercise->rest}}</td>
                                        <td>
                                            @if (isset($woExercise->exerciseTechnique)) {{$woExercise->exerciseTechnique->name}} @else - @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @else
                                <h5>@lang('messages.NoWorkout')</h5>
                            @endif
                            <br>
                        </div>
                    </div>
                    <!-- /col-md-6 -->
                    <div class="col-md-12 col-lg-6 mb">
                        <!-- BODY MEASUREMENTS PANEL -->
                        <div class="darkblue-panel pn bm-panel">
                            <div class="darkblue-header">
                                <h5 class="panel-header">@lang('messages.BodyMeasurementsHeading')</h5>
                                <div class="db-btn-group">
                                    <a href="{{route('bodymeasurements')}}" class="btn btn-primary btn-xs dashboard-btn">@lang('messages.ViewAll')</a>
                                </div>
                            </div>
                            @if(isset($weightMeasurements))
                                <canvas id="myChart" class="bm-weight-chart" width="400" height="200"></canvas>
                            @else
                                <h5>@lang('messages.NoMeasurement')</h5>
                            @endif
                        </div>
                    </div>
                    <!-- /col-md-4 -->
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
    var ctx = document.getElementById("myChart").getContext('2d');
    Chart.defaults.global.defaultFontColor = 'white';
    Chart.defaults.global.defaultFontFamily = 'Ruda';
    
    var config = {
        type: 'line',
        data: {
            labels: @json(array_keys($weightMeasurements)),
            datasets: [{
                label: "{{ __('messages.Weight') }}" ,
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: @json(array_values($weightMeasurements)),
                fill: false,
            }]
        },
        options: {
            responsive: true,
            tooltips: {
            mode: 'index',
            intersect: false
            },
            hover: {
            mode: 'nearest',
            intersect: true
            },
            scales: {
            xAxes: [{
                display: true,
                scaleLabel: {
                display: true,
                labelString: 'Month'
                }
            }],
            yAxes: [{
                display: true,
                scaleLabel: {
                display: true,
                labelString: 'Value'
                }
            }]
            }
        }
    };
    var myChart = new Chart(ctx, config);
</script>
@endpush