@extends('layouts.master') 
@section('sidebar')
    @include('athlete.sidebar')
@endsection
 
@section('content')
<section id="main-content">
    <section class="wrapper site-min-height">
        <h3>
            <i class="fa fa-angle-right"></i> @lang('messages.BodyMeasurements')
        </h3>
        <div class="btn-group pull-right bm-setting">
            <button id="weight" type="button" class="btn btn-default active">@lang('messages.Weight')</button>
            <button id="chest" type="button" class="btn btn-default">@lang('messages.Chest')</button>
            <button id="waist" type="button" class="btn btn-default">@lang('messages.Waist')</button>
            <button id="hips" type="button" class="btn btn-default">@lang('messages.Hips')</button>
            <button id="thighs" type="button" class="btn btn-default">@lang('messages.Thighs')</button>
            <button id="calves" type="button" class="btn btn-default">@lang('messages.Calves')</button>
            <button id="biceps" type="button" class="btn btn-default">@lang('messages.Biceps')</button>
        </div>
        <!-- page start-->
        <div class="row mt bm-chart">
            <div class="col-lg-12">
                <div class="content-panel">
                    <h4 class="bm-heading">
                        <i class="fa fa-angle-right"></i> <span id="bm-heading-span">@lang('messages.Weight')</span>
                    </h4>
                    <div class="panel-body">
                        <canvas id="myChart" width="800" height="200"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <!-- page end-->
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
    $(".bm-setting button").on('click', function(e) {
        var measure = e.target.id;
        $(".btn.active").removeClass('active');
        $(this).addClass('active');
        
        myChart.destroy();
        $.ajax({
            url: '/getMeasurements/' + {{Auth::guard('athlete')->user()->id}} + '/' + measure,
            success: function(data) {
                initChart(Object.keys(data), Object.values(data), capitalizeFirstLetter(measure));
                $("#bm-heading-span").text(capitalizeFirstLetter(measure))
            }
        });
    });
</script>
@endpush