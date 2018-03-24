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

@section('title', __('messages.ExerciseTechniques') . '/' . $technique->name)

@section('content')
<section id="main-content">
    <section class="wrapper site-min-height">
        <h3 class="bm-section-heading">
            <i class="fa fa-angle-right"></i> @lang('messages.ExerciseTechnique')
        </h3>
        <!-- page start-->
            <div class="row mt">
                <div class="col-lg-12">
                    <div class="content-panel">
                        <h4 class="athlete-bm-heading">
                            <i class="fa fa-angle-right"></i> {{ $technique->name }}
                        </h4>
                        @if(Auth::guard('instructor')->check())
                        <div class="edit-btns">
                            <button data-toggle="modal" data-target="#confirm-delete-modal" class="btn btn-danger btn-sm pull-right"> 
                                    <i class="fa fa-times"></i>
                                    @lang('messages.Delete')
                                </button>
                            <a href="{{ route('exercise-techniques.edit', $technique->id) }}" class="btn btn-warning btn-sm pull-right">
                                    <i class="fa fa-pencil"></i>
                                    @lang('messages.Edit')
                                </a>
                        </div>
                        @endif
                        <div class="panel-body">
                            <p class="resource-description">
                                {{ $technique->description }}
                            </p>
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
        $('#modal-confirm').on('click', function(e) {
            $.ajax({
                type: "post",
                data: {
                    _method: "DELETE"
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/exercise-techniques/" + "{{$technique->id}}",
                success: function() {
                    window.location.replace('/exercise-techniques');
                }
            });
        });   
});
</script>
@endpush