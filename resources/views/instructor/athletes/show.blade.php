@extends('layouts.master')

@section('sidebar')
    @include('instructor.sidebar')
@endsection

@section('topbar')
    @include('instructor.topbar')
@endsection

@section('title', __('messages.AthleteShow'))
 
@section('content')
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <!-- First row -->
                <div class="row mt">
                    <div class="col-md-12 mb">
                        <div class="white-panel pn personal-panel">
                            <div class="white-header">
                                <h5 class="personal-data-heading">@lang('messages.PersonalData')</h5>
                            </div>
                            @if(session('status'))
                            <div class="alert alert-success alert-created" role="alert">
                                <strong>{{ session('status') }}</strong>
                            </div>
                            @endif
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
                                        <th scope="row">@lang('messages.Email')</th>
                                        <td>{{ $athlete->email }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">@lang('messages.MembershipStartDate')</th>
                                        <td>{{ $athlete->created_at->format('d/m/y') }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="content-panel">
                            <h4 class="athlete-bm-heading">
                                <i class="fa fa-angle-right"></i> <span id="bm-heading-span">@lang('messages.Weight')</span>
                            </h4>
                            <div class="btn-group pull-right athlete-bm-setting">
                                <button id="weight" type="button" class="btn btn-default active">@lang('messages.Weight')</button>
                                <button id="chest" type="button" class="btn btn-default">@lang('messages.Chest')</button>
                                <button id="waist" type="button" class="btn btn-default">@lang('messages.Waist')</button>
                                <button id="hips" type="button" class="btn btn-default">@lang('messages.Hips')</button>
                                <button id="thighs" type="button" class="btn btn-default">@lang('messages.Thighs')</button>
                                <button id="calves" type="button" class="btn btn-default">@lang('messages.Calves')</button>
                                <button id="biceps" type="button" class="btn btn-default">@lang('messages.Biceps')</button>
                            </div>
                            <div class="panel-body">
                                <canvas id="myChart" width="800" height="200"></canvas>
                                 <form class="form-horizontal style-form" method="POST" action="{{route('athletes.measurements.store', $athlete->id)}}">
                                    @csrf
                                    <input type="hidden" name="athlete_id" value="{{$athlete->id}}">
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">@lang('messages.Weight')</label>
                                        <div class="col-sm-2">
                                            <input name="weight" type="text" class="form-control">
                                        </div>
                                        <label class="col-sm-1 control-label">@lang('messages.Chest')</label>
                                        <div class="col-sm-2">
                                            <input name="chest" type="text" class="form-control">
                                        </div>
                                        <label class="col-sm-1 control-label">@lang('messages.Waist')</label>
                                        <div class="col-sm-2">
                                            <input name="waist" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">@lang('messages.Hips')</label>
                                        <div class="col-sm-2">
                                            <input name="hips" type="text" class="form-control">
                                        </div>
                                        <label class="col-sm-1 control-label">@lang('messages.Thighs')</label>
                                        <div class="col-sm-2">
                                            <input name="thighs" type="text" class="form-control">
                                        </div>
                                        <label class="col-sm-1 control-label">@lang('messages.Calves')</label>
                                        <div class="col-sm-2">
                                            <input name="calves" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">@lang('messages.Biceps')</label>
                                        <div class="col-sm-2">
                                            <input name="biceps" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary pull-right">@lang('messages.Register')</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>
@endsection
 
@push('script')
<script src="{{ asset('js/util.js') }}"></script>
<script>
    function initChart(labels, data, title) {
        var ctx = document.getElementById("myChart").getContext('2d');
        Chart.defaults.global.defaultFontColor = 'black';
        Chart.defaults.global.defaultFontFamily = 'Ruda';
        window.chartColors = [
            'rgb(255, 99, 132)',
            'rgb(255, 159, 64)',
            'rgb(255, 205, 86)',
            'rgb(75, 192, 192)',
            'rgb(54, 162, 235)',
            'rgb(153, 102, 255)',
            'rgb(101, 75, 12)'
        ];
        var color = window.chartColors[getRandom(0,6)]
        var config = {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: title,
                    backgroundColor: color,
                    borderColor: color,
                    data: data,
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
                    labelString: 'Day'
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
        window.myChart = new Chart(ctx, config);
    }
    initChart(@json(array_keys($weightMeasurement)), @json(array_values($weightMeasurement)), 'Weight');
    $(".athlete-bm-setting button").on('click', function(e) {
        var measure = e.target.id;
        $(".btn.active").removeClass('active');
        $(this).addClass('active');
        
        myChart.destroy();
        $.ajax({
            url: '/getMeasurements/' + {{$athlete->id}} + '/' + measure,
            success: function(data) {
                initChart(Object.keys(data), Object.values(data), capitalizeFirstLetter(measure));
                $("#bm-heading-span").text(capitalizeFirstLetter(measure))
            }
        });
    });
</script>
@endpush