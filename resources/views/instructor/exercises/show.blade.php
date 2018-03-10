@extends('layouts.master') 

@section('sidebar') 
    @if(Auth::guard('instructor')->check())
        @include('instructor.sidebar') 
    @else
        @include('athlete.sidebar') 
    @endif
@endsection
 
@section('topbar') 
    @if(Auth::guard('instructor')->check())
        @include('instructor.topbar')
    @else
        @include('athlete.topbar') 
    @endif
@endsection
 
@section('title', __('messages.ExerciseShow')) 

@section('content')
<section id="main-content">
    <section class="wrapper site-min-height">
        <h3 class="bm-section-heading">
            <i class="fa fa-angle-right"></i> @lang('messages.Techniques')
        </h3>
        <!-- page start-->
        <div class="row mt">
            <div class="col-lg-12">
                <div class="content-panel">
                    <h4 class="bm-heading">
                        <i class="fa fa-angle-right"></i> {{ $exercise->name }}
                    </h4>
                    <div class="panel-body">
                        <ol class="list-group exercise-desc">
                            @foreach ($exercise->exerciseSteps->sortBy('id') as $step)
                            <li id="step-{{$step->id}}" class="list-group-item">
                                {{ $step->description }}
                                <button data-toggle="modal" data-target="#confirm-delete-modal" data-resource-id="{{$step->id}}" class="btn btn-danger btn-xs"> 
                                    <i class="fa fa-times"></i>
                                </button>
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
});
</script>
@endpush