@extends('layouts.master')

@section('sidebar')

    @include('athlete.sidebar')
@endsection

@section('topbar')
    @include('athlete.topbar')
@endsection

@section('title', __('messages.ExerciseProgressShow'))
 
@section('content')
<section id="main-content">
    <section class="wrapper site-min-height">
        <h3 class="bm-section-heading">
            <i class="fa fa-angle-right"></i> @lang('messages.ExerciseProgress')
        </h3>
        <!-- page start-->
        <div class="row mt">
            <div class="col-lg-12">
                <div class="content-panel">
                    <h4 class="bm-heading">
                        <i class="fa fa-angle-right"></i> {{ $exerciseName }}
                    </h4>
                    <div class="panel-body">
                        <canvas id="myChart" width="800" height="200"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt">
            <div class="col-lg-12">
                <div class="form-panel ep-form">
                    <h4 class="bm-heading"><i class="fa fa-angle-right"></i> @lang('messages.NewExerciseProgress')</h4>
                    @include('shared.errors')
                    <form class="form-horizontal style-form" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <div class="col-sm-2">
                                <input name="weight" type="number" min="0" required placeholder="@lang('messages.Weight')" type="text" class="form-control">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">@lang('messages.Register')</button>
                    </form>
                </div>
            </div>
            <!-- col-lg-12-->
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
                maintainAspectRatio: false,
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
                    labelString: "{{__('messages.Day')}}"
                    }
                }],
                yAxes: [{
                    display: true,
                    scaleLabel: {
                        display: true,
                    labelString: "{{__('messages.Value')}}"
                    }
                }]
                }
            }
        };
        window.myChart = new Chart(ctx, config);
    }
    initChart(@json(array_keys($progress)), @json(array_values($progress)), "{{__('messages.Weight')}}");
</script>
@endpush