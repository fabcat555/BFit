@extends('layouts.master') 
@section('sidebar')
    @include('athlete.sidebar')
@endsection
 
@section('content')
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <!-- First row -->
                <div class="row mt">
                    <div class="col-md-12 col-lg-6 mb">
                        <div class="white-panel pn personal-panel">
                            <div class="white-header">
                                <h5 class="personal-data-heading black-heading">@lang('messages.PersonalData')</h5>
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
                        <!-- WHITE PANEL - TOP USER -->
                        <div class="white-panel pn membership-panel">
                            <div class="white-header">
                                <h5 class="black-heading">@lang('messages.MembershipHeading')</h5>
                            </div>
                            <table class="table table-borderless table-description">
                                <tbody>
                                    <tr>
                                        <th scope="row">@lang('messages.Type')</th>
                                        <td>{{ $membership->type->name }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">@lang('messages.MembershipStatus')</th>
                                        <td>{{ $membership->status ? 'Active' : 'Inactive' }}</td>
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
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="small mt">@lang('messages.MembershipStartYear')</p>
                                    <p>{{ $athlete->memberships->first()->created_at->year }}</p>
                                </div>
                                <div class="col-md-6">
                                    <p class="small mt">@lang('messages.MembershipCost')</p>
                                    <p>$ {{ $membership->type->price }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /col-md-6 -->
                </div>
                <!-- /row -->
                <!-- Second row -->
                <div class="row">
                    <!-- /col-md-4 -->
                    <div class="col-md-12 col-lg-6 mb">
                        <!-- INSTAGRAM PANEL -->
                        <div class="grey-panel pn workout-panel">
                            <div class="grey-header">
                                <h5 class="wo-panel-heading black-heading">@lang('messages.AssignedWorkoutHeading')</h5>
                                <a href="{{route('workout.history')}}" class="btn btn-primary btn-xs dashboard-btn">
                                    @lang('messages.ViewHistory')
                                </a>
                                <a href="{{route('workout')}}" class="btn btn-primary btn-xs dashboard-btn">
                                    @lang('messages.ViewAll')
                                </a>
                            </div>
                            <table class="table table-borderless table-description">
                                <tbody>
                                    <tr>
                                        <th scope="row">@lang('messages.Type')</th>
                                        <td>{{ $athlete->currentWorkout()->type->name }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">@lang('messages.StartDate')</th>
                                        <td>{{ $athlete->currentWorkout()->start_date->format('d/m/y') }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">@lang('messages.EndDate')</th>
                                        <td>{{ $athlete->currentWorkout()->end_date->format('d/m/y') }}</td>
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
                                    @foreach ($athlete->currentWorkout()->workoutExercises as $woExercise)
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
                            <br>
                        </div>
                    </div>
                    <!-- /col-md-4 -->
                    <div class="col-md-12 col-lg-6 mb">
                        <div class="darkblue-panel pn bm-panel">
                            <div class="darkblue-header">
                                <h5 class="bm-panel-heading">@lang('messages.BodyMeasurementsHeading')</h5>
                                <a href="{{route('bodymeasurements')}}" class="btn btn-primary btn-xs dashboard-btn">@lang('messages.ViewAll')</a>
                            </div>
                            <canvas id="myChart" class="bm-weight-chart" width="400" height="250"></canvas>
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
            labels: @json(array_keys($weightMeasurement)),
            datasets: [{
                label: "Peso",
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: @json(array_values($weightMeasurement)),
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