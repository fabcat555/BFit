@extends('layouts.master') 
@section('sidebar')
    @include('instructor.sidebar')
@endsection
 
@section('topbar')
    @include('instructor.topbar')
@endsection
 
@section('title', __('messages.ExerciseEdit')) 
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
                    <div id="exercise-form" class="panel panel-danger">
                        <div class="panel-heading">
                            <h3 class="panel-title">@lang('messages.ExerciseData')</h3>
                        </div>
                        <div class="panel-body">
                            <form class="form-horizontal style-form" method="post" action="{{route('exercises.update', ['id' => $exercise->id])}}">
                                @csrf {{ method_field('put') }}
                                <fieldset>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">@lang('messages.Name')</label>
                                        <div class="col-sm-12">
                                            <input name="name" required type="text" class="form-control" value="{{ $exercise->name }}">
                                        </div>
                                    </div>
                                    @foreach ($exercise->exerciseSteps as $key => $step)
                                    <div class="form-group step-input" id="step-{{$step->id}}">
                                        <label class="step-label control-label"><span class="step-key">@lang('messages.Step') {{$key+1}}</span></label> 
                                        <button type="button" data-toggle="modal" data-target="#confirm-delete-modal" data-resource-id="{{$step->id}}" class="btn btn-danger btn-xs"> 
                                            <i class="fa fa-times"></i>
                                        </button>
                                        <div class="col-sm-12">
                                            <textarea name="{{ 'exerciseSteps[' . $step->id . '][description]'}}" class="form-control" required>{{ $step->description }}</textarea>
                                        </div>
                                    </div>
                                    @endforeach
                                </fieldset>
                                <button type="button" id="add-step" class="btn btn-default pull-left">@lang('messages.AddExerciseStep')</button>
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
<!-- Modal -->
<div id="confirm-delete-modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">@lang('messages.DeleteConfirmModalHeader')</h4>
            </div>
            <div class="modal-body">
                <p>@lang('messages.DeleteConfirmModalBody')</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">@lang('messages.CloseModal')</button>
                <button id="modal-confirm" type="button" class="btn btn-danger">@lang('messages.ConfirmModal')</button>
            </div>
        </div>
    </div>
</div>
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
        var modal = $('#confirm-delete-modal');
        modal.on('show.bs.modal', function(e) {
            $('#modal-confirm').data('resource-id', $(e.relatedTarget).data('resource-id'));
        });
        $('#modal-confirm').on('click', function(e) {
            var resourceId = $(this).data('resource-id');
            $.ajax({
                type: "post",
                data: {
                    _method: "DELETE"
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/exercise-steps/" + resourceId,
                success: function() {
                    $('#step-' + resourceId).fadeOut(1000, function() {$(this).remove()});
                    modal.modal('hide');
                }
            });
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