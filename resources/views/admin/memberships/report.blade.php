@extends('layouts.master') 
@section('sidebar')
    @include('admin.sidebar')
@endsection
 
@section('content')
<section id="main-content">
    <section class="wrapper">
        <div class="row mt">
            <div class="col-lg-12">
                <!-- First row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="content-panel">
                            <h4 class="athlete-bm-heading">
                                <i class="fa fa-angle-right"></i> <span id="bm-heading-span">@lang('messages.Weight')</span>
                            </h4>
                            <div class="btn-group pull-right athlete-bm-setting">
                                <button id="week" type="button" class="btn btn-default active">@lang('messages.Week')</button>
                                <button id="month" type="button" class="btn btn-default">@lang('messages.Month')</button>
                                <button id="year" type="button" class="btn btn-default">@lang('messages.Year')</button>
                            </div>
                            <div class="panel-body">
                                <canvas id="myChart" width="800" height="200"></canvas>
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
            type: 'bar',
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
                    barPercentage: 0.4,
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
                    labelString: 'Membership',
                    },
                    ticks: {
                        beginAtZero: true,
                        stepSize: 1
                    }
                }]
                }
            }
        };
        window.myChart = new Chart(ctx, config);
    }
    initChart(@json(array_keys($report)), @json(array_values($report)), 'Week');
    $(".athlete-bm-setting button").on('click', function(e) {
        var timeRange = e.target.id;
        $(".btn.active").removeClass('active');
        $(this).addClass('active');
        
        myChart.destroy();
        $.ajax({
            url: '/memberships/' + timeRange,
            success: function(data) {
                initChart(Object.keys(data), Object.values(data), capitalizeFirstLetter(timeRange));
                $("#bm-heading-span").text(capitalizeFirstLetter(timeRange))
            }
        });
    });
</script>
@endpush