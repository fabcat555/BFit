@extends('layouts.master') 
@section('sidebar') @if(Auth::guard('instructor')->check())
    @include('instructor.sidebar') @else
    @include('athlete.sidebar') @endif
@endsection
 
@section('topbar') @if(Auth::guard('instructor')->check())
    @include('instructor.topbar')
@else
    @include('athlete.topbar') @endif
@endsection
 
@section('title', __('messages.ExerciseShow')) 
@section('content')
<section id="main-content">
    <section class="wrapper site-min-height">
        <h3 class="bm-section-heading">
            <i class="fa fa-angle-right"></i> @lang('messages.Exercises')
        </h3>
        <!-- page start-->
        <div class="row mt">
            <div class="col-lg-12">
                <div class="content-panel">
                    <h4 class="athlete-bm-heading">
                        <i class="fa fa-angle-right"></i> <span id="bm-heading-span"> {{ $exercise->name }}</span>
                    </h4>
                    @if(Auth::guard('instructor')->check())
                    <div class="edit-btns">
                        <button data-toggle="modal" data-target="#confirm-delete-modal" data-resource-id="{{$exercise->id}}" data-item="exercise"
                            class="btn btn-danger btn-sm pull-right"> 
                            <i class="fa fa-times"></i>
                            @lang('messages.Delete')
                        </button>
                        <a href="{{ route('exercises.edit', ['exercise' => $exercise->id]) }}" class="btn btn-warning btn-sm pull-right">
                            <i class="fa fa-pencil"></i>
                            @lang('messages.Edit')
                        </a>
                    </div>
                    @endif
                    <div class="panel-body">
                        <ol class="list-group exercise-desc">
                            @foreach ($exercise->exerciseSteps->sortBy('id') as $step)
                            <li id="step-{{$step->id}}" class="list-group-item">
                                {{ $step->description }} @if(Auth::guard('instructor')->check())
                                <button data-toggle="modal" data-target="#confirm-delete-modal" data-resource-id="{{$step->id}}" data-item="step" class="btn btn-danger btn-xs"> 
                                    <i class="fa fa-times"></i>
                                </button> @endif
                            </li>
                            @endforeach
                        </ol>
                    </div>
                </div>
            </div>
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
    $(document).ready(function() {
        var modal = $('#confirm-delete-modal');
        modal.on('show.bs.modal', function(e) {
            $('#modal-confirm').data('resource-id', $(e.relatedTarget).data('resource-id'));
            $('#modal-confirm').data('item', $(e.relatedTarget).data('item'));
        });
        $('#modal-confirm').on('click', function(e) {
            var resourceId = $(this).data('resource-id');
            var item = $(this).data('item');
            $.ajax({
                type: "post",
                data: {
                    _method: "DELETE"
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: (item === 'exercise' ? "/exercises/" : "/exercise-steps/") + resourceId,
                success: function() {
                    if (item === 'exercise') {
                        window.location.replace('/exercises');
                    }
                    else {
                        $('#step-' + resourceId).fadeOut(1000, function() {$(this).remove()});
                        modal.modal('hide');
                    }
                }
            });
        });   
});
</script>
@endpush