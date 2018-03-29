@extends('layouts.master')

@section('sidebar')

    @include('instructor.sidebar')
@endsection

@section('topbar')
    @include('instructor.topbar')
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
                    <form class="form-horizontal style-form" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <div class="col-sm-2">
                                <input name="weight" required placeholder="Weight" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <textarea name="notes" placeholder="Notes" class="form-control"></textarea>
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
<script src="{{ asset('js/chart-helper.js') }}"></script>
<script>
     var chartConfig = {
        'labels': @json(array_keys($progress)),
        'data': @json(array_values($progress)),
        'title': "@lang('messages.Weight')",
        'xAxesLabel': "@lang('messages.Day')",
        'yAxesLabel': "@lang('messages.Weight')"
    };
    initChart(chartConfig);
</script>
@endpush