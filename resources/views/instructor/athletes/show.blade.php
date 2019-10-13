@extends('layouts.master') 

@section('sidebar')
    @include('instructor.sidebar')
@endsection
 
@section('topbar')
    @include('instructor.topbar')
@endsection
 
@section('title', __('messages.Athletes') . '/' . $athlete->first_name . ' ' . $athlete->last_name)

@section('content')
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <!-- First row -->
                <div class="row mt">
                    <div class="col-md-12 mb">
                        <div class="white-panel pn personal-panel">
                            <div class="panel-header-red">
                                <h5 class="panel-header">@lang('messages.PersonalData')</h5>
                                <div class="db-btn-group">
                                    <a href="{{route('instructor.athletes.edit', ['instructor' => Auth::guard('instructor')->user(), 'athlete' => $athlete])}}" class="btn btn-primary btn-sm dashboard-btn">
                                        <i class="fa fa-pencil"></i>
                                        <span class="btn-title">@lang('messages.Edit')</span>
                                    </a>
                                    <button data-toggle="modal" data-target="#confirm-delete-modal" class="btn btn-primary btn-sm dashboard-btn"> 
                                        <i class="fa fa-times"></i>
                                        <span class="btn-title">@lang('messages.Delete')</span>
                                    </button>
                                </div>
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
                                        <th scope="row">@lang('messages.Gender')</th>
                                        <td>{{ $athlete->gender }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">@lang('messages.Email')</th>
                                        <td>{{ $athlete->email }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">@lang('messages.MembershipStartDate')</th>
                                        <td>{{ $athlete->created_at->format('d/m/y') }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">@lang('messages.Notes')</th>
                                        <td>@if(!empty($athlete->notes)) {{ $athlete->notes }} @else - @endif</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row mb">
                    <div class="col-lg-12">
                        <div class="grey-panel pn">
                            <div class="panel-header-black">
                                <h5 class="panel-header">{{ Str::upper(__('messages.AssignedWorkout')) }}</h5>
                                <div class="db-btn-group">
                                    @if(isset($workout))
                                        <a href="{{route('workouts.edit', $workout->id)}}" class="btn btn-primary btn-sm dashboard-btn">
                                            <i class="fa fa-pencil"></i>
                                            <span class="btn-title">@lang('messages.Edit')</span>
                                        </a>
                                    @endif
                                    <a href="{{route('workouts.create', $athlete->id)}}" type="button" class="btn btn-primary btn-sm dashboard-btn">
                                        <i class="fa fa-wrench"></i>
                                        <span class="btn-title">@lang('messages.AssignWorkout')</span>
                                    </a>
                                </div>
                            </div>
                            @if (isset($workout))
                            <table class="table table-borderless table-description">
                                <tbody>
                                    <tr>
                                        <th scope="row">@lang('messages.Type')</th>
                                        <td>@if(isset($workout->type)) {{ $workout->type->name }} @else - @endif</td>
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
                            <table id="workout" class="table table-hover table-workout">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>@lang('messages.Exercise')</th>
                                        <th>@lang('messages.Sets')</th>
                                        <th>@lang('messages.Reps')</th>
                                        <th>@lang('messages.Rest')</th>
                                        <th>@lang('messages.Technique')</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($workout->workoutExercises->sortBy('day')->groupBy('day') as $day => $exercises)
                                    <tr>
                                        <th colspan="7" scope="colgroup">
                                            @lang('messages.Day') {{$day}}
                                        </th>
                                        <th style="display: none;"></th>
                                        <th style="display: none;"></th>
                                        <th style="display: none;"></th>
                                        <th style="display: none;"></th>
                                        <th style="display: none;"></th>
                                        <th style="display: none;"></th>
                                    </tr>
                                    @foreach($exercises as $key => $woExercise)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>
                                            <a href="{{route('exercises.show', ['id' => $woExercise->exercise->id])}}">{{$woExercise->exercise->name}}</a>
                                        </td>
                                        <td>{{$woExercise->sets}}</td>
                                        <td>{{$woExercise->reps}}</td>
                                        <td>{{$woExercise->rest}}</td>
                                        <td>
                                            @if (isset($woExercise->exerciseTechnique))
                                            <a href="{{route('exercise-techniques.show', ['technique' => $woExercise->exerciseTechnique->id])}}">
                                                {{$woExercise->exerciseTechnique->name}}
                                            </a> @else - @endif
                                        </td>
                                        <td>
                                            @if(!empty($woExercise->notes))
                                                <button type="button" data-toggle="modal" data-target="#notes-modal" data-notes="{{$woExercise->notes}}" class="btn btn-primary btn-xs"><i class="fa fa-file-text-o"></i></button>
                                            @endif
                                            <a href="{{ route('progress.show', ['exercise' => $woExercise->id]) }}" class="btn btn-warning btn-xs"><i class="fa fa-bar-chart-o"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach @endforeach
                                </tbody>
                            </table>
                            @else
                            <h5>@lang('messages.NoWorkout')</h5>
                            @endif
                            <br>
                        </div>
                    </div>
                </div>
                <!-- /row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="white-panel pn">
                            <div class="panel-header-red">
                                <h5 class="panel-header">@lang('messages.BodyMeasurementsHeading')</h5>
                            </div>
                            <div class="panel-body">
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
                                <div class="row">
                                        <canvas id="myChart" width="600" height="200"></canvas>
                                        <button class="btn btn-default btn-danger pull-right" id="toggle-bm-form" type="button">@lang('messages.NewBodyMeasurement')</button>
                                </div>
                                <div class="row mt">
                                    <div id="bm-form" class="col-lg-12">
                                        <form class="form-horizontal style-form" method="POST" action="{{route('athletes.measurements.store', $athlete->id)}}">
                                            @csrf
                                            <input type="hidden" name="athlete_id" value="{{$athlete->id}}">
                                            <div class="form-group">
                                                <label class="col-sm-1 control-label">@lang('messages.Weight')</label>
                                                <div class="col-sm-2">
                                                    <input name="weight" required type="numeric" class="form-control">
                                                </div>
                                                <label class="col-sm-1 control-label">@lang('messages.Chest')</label>
                                                <div class="col-sm-2">
                                                    <input name="chest" required type="numeric" class="form-control">
                                                </div>
                                                <label class="col-sm-1 control-label">@lang('messages.Waist')</label>
                                                <div class="col-sm-2">
                                                    <input name="waist" required type="numeric" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-1 control-label">@lang('messages.Hips')</label>
                                                <div class="col-sm-2">
                                                    <input name="hips" required type="numeric" class="form-control">
                                                </div>
                                                <label class="col-sm-1 control-label">@lang('messages.Thighs')</label>
                                                <div class="col-sm-2">
                                                    <input name="thighs" required type="numeric" class="form-control">
                                                </div>
                                                <label class="col-sm-1 control-label">@lang('messages.Calves')</label>
                                                <div class="col-sm-2">
                                                    <input name="calves" required type="numeric" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-1 control-label">@lang('messages.Biceps')</label>
                                                <div class="col-sm-2">
                                                    <input name="biceps" required type="numeric" class="form-control">
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
            </div>
        </div>
    </section>
</section>
<!-- Modals -->
@include('shared.modals.confirm-delete')
@include('shared.modals.notes')
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
        'yAxesLabel': "@lang('messages.Weight')",
        'ratio': true
    };
    initChart(chartConfig);
    $(".athlete-bm-setting button").on('click', function(e) {
        var measure = e.target.id;
        $(".btn.active").removeClass('active');
        $(this).addClass('active');
        
        myChart.destroy();
        $.ajax({
            url: '/BFit/public/getMeasurements/' + {{$athlete->id}} + '/' + measure,
            success: function(data) {
                var newConfig = {
                    'labels': Object.keys(data),
                    'data': Object.values(data),
                    'title': $('.btn.active').text(),
                    'xAxesLabel': "@lang('messages.Day')",
                    'yAxesLabel': "@lang('messages.Weight')",
                    'ratio': true
                };
                initChart(newConfig);
                $("#bm-heading-span").text($('.btn.active').text());
                window.scrollTo(0,document.body.scrollHeight);
            }
        });
    });
    $("#toggle-bm-form").on('click', function(e) {
        $("#bm-form").slideToggle();
    });
    $('#modal-confirm').on('click', function(e) {
        $.ajax({
            type: "post",
            data: {
                _method: "DELETE"
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/instructor/{{Auth::guard('instructor')->user()->id}}/athletes/' + "{{$athlete->id}}",             
            success: function() {
                window.location.replace('/instructor/{{Auth::guard('instructor')->user()->id}}/athletes');
            }
        });
    });
    $('#notes-modal').on('show.bs.modal', function(e) {
        $('.modal-body p').text($(e.relatedTarget).data('notes'));
    });
    var workoutTable = $('.table-workout').DataTable( {
        ordering: false,
        info: false,
        paging: false,
        lengthChange: false,
        searching: false,
        responsive: true,
        "scrollX": true,
        autoWidth: false,
        buttons: [
            'copy', 'excel', 'pdf'
        ]
    });
    workoutTable.buttons().container().appendTo($('.col-sm-6:eq(1) '));
</script>
@endpush