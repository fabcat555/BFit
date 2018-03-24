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
                    <div id="athlete-form" class="panel panel-danger">
                        <div class="panel-heading">
                            <h3 class="panel-title">@lang('messages.ExerciseData')</h3>
                        </div>
                        <div class="panel-body">
                            <form id="exercise-form" class="form-horizontal style-form" method="post" action="{{route('exercises.store')}}">
                                @csrf
                                <fieldset>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">@lang('messages.Name')</label>
                                        <div class="col-sm-12">
                                            <input name="name" type="text" required class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group step-input">
                                        <label class="step-label control-label">@lang('messages.Step') <span class="step-key">1</span></label>
                                        <div class="col-sm-12">
                                            <textarea name="steps[]" required class="form-control"></textarea>
                                        </div>
                                    </div>
                                </fieldset>
                                <button type="submit" class="btn btn-primary pull-right">@lang('messages.Register')</button>
                                <button type="button" id="add-step" class="btn btn-default">@lang('messages.AddExerciseStep')</button>
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
    var steps = $('.step-label').length;
    $(function () {
        $('#add-step').on('click', function() {
            steps++;
            $('#exercise-form fieldset').append(
                '<div class="form-group step-input"> <label class="step-label control-label">@lang('messages.Step') <span class="step-key">' + steps + '</span></label><button type="button" class="btn btn-danger btn-xs remove-item"> <i class="fa fa-times"></i> </button> <div class="col-sm-12"> <textarea name="steps[]" class="form-control" required></textarea></div></div>')
        });
        $(document).on('click', ".remove-item", function(e) {
            steps--;
            $(this).parent().nextAll('.step-input').find('.step-key').each(function(){
               $(this).text(parseInt($(this).text())-1);
           });
           $(this).parent().fadeOut(1000, function() {$(this).remove()});
        });
    });
</script>
@endpush