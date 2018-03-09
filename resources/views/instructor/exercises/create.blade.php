@extends('layouts.master')

@section('sidebar')
    @include('instructor.sidebar')
@endsection

@section('topbar')
    @include('instructor.topbar')
@endsection

@section('title', __('messages.ExerciseCreate'))
 
@section('content')
<section id="main-content">
    <section class="wrapper site-min-height">
        <h3 class="bm-section-heading">
            <i class="fa fa-angle-right"></i> @lang('messages.NewExercise')
        </h3>
        <!-- page start-->
        <div class="row mt">
            <div class="col-lg-12">
                <div class="form-panel">
                    @include('shared.errors')
                    <div id="athlete-form" class="panel panel-default">
                        <div class="panel-heading">@lang('messages.Exercise')</div>
                        <div class="panel-body">
                            <form id="exercise-form" class="form-horizontal style-form" method="post" action="{{route('exercises.store')}}">
                                @csrf
                                <fieldset>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">@lang('messages.Name')</label>
                                        <div class="col-sm-12">
                                            <input name="name" type="text" required class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">@lang('messages.Step')</label>
                                        <div class="col-sm-12">
                                            <textarea name="steps[]" required class="form-control"></textarea>
                                        </div>
                                    </div>
                                </fieldset>
                                <button type="submit" class="btn btn-primary pull-right">@lang('messages.Register')</button>
                                <button id="add-step" class="btn btn-default">@lang('messages.AddExerciseStep')</button>
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

@push('script')
<script>
    $(function () {
        $('#add-step').on('click', function() {
            $('#exercise-form fieldset').append(
                '<div class="form-group"> <label class="col-sm-2 col-sm-2 control-label">@lang('messages.Step')</label> <div class="col-sm-12"> <textarea name="steps[]" class="form-control"></textarea></div></div>')
        });
    });
</script>
@endpush