@extends('layouts.master') 

@section('sidebar')
    @include('athlete.sidebar')
@endsection

@section('topbar')
    @include('athlete.topbar')
@endsection

@section('title', __('messages.BodyMeasurementsShow'))
 
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
                        @if(isset($weightMeasurements))
                            <canvas id="myChart" width="800" height="200"></canvas>
                        @else
                            <h5>@lang('messages.NoMeasurement')</h5>
                        @endif
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
<script src="{{ asset('js/chart-helper.js') }}"></script>
<script>
    var chartConfig = {
        'labels': @json(array_keys($weightMeasurements)),
        'data': @json(array_values($weightMeasurements)),
        'title': "@lang('messages.Weight')",
        'xAxesLabel': "@lang('messages.Day')",
        'yAxesLabel': "@lang('messages.Weight')"
    }
    initChart(chartConfig);
    $(".bm-setting button").on('click', function(e) {
        var measure = e.target.id;
        $(".btn.active").removeClass('active');
        $(this).addClass('active');
        
        myChart.destroy();
        $.ajax({
            url: '/BFit/public/getMeasurements/' + measure,
            success: function(data) {
                var newConfig = {
                    'labels': Object.keys(data),
                    'data': Object.values(data),
                    'title': $('.btn.active').text(),
                    'xAxesLabel': "@lang('messages.Day')",
                    'yAxesLabel': "@lang('messages.Weight')"
                };
                initChart(newConfig);
                $("#bm-heading-span").text($('.btn.active').text())
            }
        });
    });
</script>
@endpush