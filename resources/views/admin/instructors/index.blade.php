@extends('layouts.master') 
@section('sidebar')
    @include('admin.sidebar')
@endsection
 
@section('topbar')
    @include('admin.topbar')
@endsection
 
@section('title', __('messages.InstructorsIndex')) 
@section('content')
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <!-- First row -->
                <div class="row mt">
                    <div class="col-md-12 mb">
                        <!-- WHITE PANEL - TOP USER -->
                        <div class="white-panel pn">
                            <div class="panel-header-red">
                                <h5 class="panel-header">@lang('messages.InstructorsHeading')</h5>
                                <div class="db-btn-group">
                                    <a href="{{route('instructors.create')}}" class="btn btn-primary btn-sm dashboard-btn">
                                        <i class="fa fa-plus"></i>
                                        @lang('messages.New')
                                    </a>
                                </div>
                            </div>
                            @if(session('status'))
                            <div class="alert alert-success alert-created" role="alert">
                                <strong>{{ session('status') }}</strong>
                            </div>
                            @endif
                            <table id="instructors" class="table table-hover table-workout">
                                <thead>
                                    <tr>
                                        <th>@lang('messages.Name')</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($instructors as $instructor)
                                    <tr>
                                        <td>{{$instructor->first_name}} {{$instructor->last_name}}</td>
                                        <td>
                                            <a href="{{ route('instructors.show', $instructor->id) }}" class="btn btn-warning btn-xs">
                                                <i class="fa fa-user"></i>
                                            </a>
                                            <a href="{{ route('instructors.edit', $instructor->id) }}" class="btn btn-primary btn-xs">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <button data-toggle="modal" data-target="#confirm-delete-modal" data-resource-id="{{$instructor->id}}" class="btn btn-danger btn-xs"> 
                                                    <i class="fa fa-times"></i>
                                                </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /col-md-6 -->
                </div>
                <!-- /row -->
            </div>
        </div>
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
    $(document).ready(function(){
        var table = $('#instructors').DataTable( {
            info: false,
            language: {
                url: "{{ App::isLocale('it') ? asset('js/datatables/i18n/Italian.json') : '' }}"
            },
            buttons: [
                'copy', 'excel', 'pdf'
            ],
            initComplete: function () {
                setTimeout( function () {
                     table.buttons().container().appendTo( $('.col-sm-5', table.table().container() ) );
                }, 10 );
            }
    } );
    
    $('#confirm-delete-modal').on('show.bs.modal', function(e) {
            $('#modal-confirm').data('resource-id', $(e.relatedTarget).data('resource-id'));
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
                url: "/instructors/" + $(this).data('resource-id'),
                success: function() {
                    location.reload();
                }
            });
        });
});
</script>
@endpush