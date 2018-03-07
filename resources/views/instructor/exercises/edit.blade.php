@extends('layouts.master') 
@section('sidebar')
    @include('instructor.sidebar')
@endsection
 
@section('content')
<section id="main-content">
    <section class="wrapper site-min-height">
        <h3 class="bm-section-heading">
            <i class="fa fa-angle-right"></i> {{ $exercise->name }}
        </h3>
        <!-- page start-->
        <div class="row mt">
            <div class="col-lg-12">
                <div class="form-panel">
                @include('shared.errors')
                    <div id="athlete-form" class="panel panel-default">
                        <div class="panel-heading">@lang('messages.AthletePersonals')</div>
                        <div class="panel-body">
                            <form class="form-horizontal style-form" method="post" action="{{route('exercises.update', ['id' => $exercise->id])}}">
                                @csrf
                                {{ method_field('put') }}
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">@lang('messages.FirstName')</label>
                                    <div class="col-sm-12">
                                        <input name="name" required type="text" class="form-control" value="{{ $exercise->name }}">
                                    </div>
                                </div>
                                @foreach ($exercise->exerciseSteps as $step)
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">@lang('messages.Step')</label>
                                    <div class="col-sm-12">
                                        <textarea name="{{ 'exerciseSteps[' . $step->id . '][description]'}}" class="form-control">{{ $step->description }}</textarea>
                                    </div>
                                </div>
                                @endforeach
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