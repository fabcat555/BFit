@extends('layouts.master')

@section('sidebar')
    @include('instructor.sidebar')
@endsection

@section('topbar')
    @include('instructor.topbar')
@endsection

@section('title', __('messages.WorkoutTypeEdit'))
 
@section('content')
<section id="main-content">
    <section class="wrapper site-min-height">
        <h3 class="bm-section-heading">
            <i class="fa fa-angle-right"></i> {{ $workoutType->name }}
        </h3>
        <!-- page start-->
        <div class="row mt">
            <div class="col-lg-12">
                <div class="form-panel">
                @include('shared.errors')
                    <div id="athlete-form" class="panel panel-default">
                        <div class="panel-heading">@lang('messages.WorkoutType')</div>
                        <div class="panel-body">
                            <form class="form-horizontal style-form" method="post" action="{{route('workout-types.update', $workoutType->id)}}">
                                @csrf
                                {{ method_field('put') }}
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">@lang('messages.Name')</label>
                                    <div class="col-sm-12">
                                        <input name="name" required type="text" class="form-control" value="{{ $workoutType->name }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">@lang('messages.Description')</label>
                                    <div class="col-sm-12">
                                        <textarea name="description" required class="form-control">{{ $workoutType->description }}</textarea>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary pull-right">@lang('messages.Register')</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- col-lg-12-->
        </div>
        <!-- page end-->
    </section>
</section>
@endsection