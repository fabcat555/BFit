@extends('layouts.master') 

@section('sidebar')
    @include('instructor.sidebar')
@endsection

@section('topbar')
    @include('instructor.topbar')
@endsection

@section('title', __('messages.AthletesShow'))
 
@section('content')
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <!-- First row -->
                <div class="row mt">
                    <div class="col-md-12 mb">
                        <!-- WHITE PANEL - TOP USER -->
                        @if(session('status'))
                        <div class="alert alert-success alert-created" role="alert">
                            <strong>{{ session('status') }}</strong>
                        </div>
                        <div class="white-panel pn">
                            <div class="white-header">
                                <h5 class="panel-header">@lang('messages.AssignedAthletes')</h5>
                                <div class="db-btn-group">
                                    <a href="{{route('instructor.athletes.create', ['instructor' => Auth::guard('instructor')->user()])}}" class="btn btn-primary btn-xs dashboard-btn">
                                        @lang('messages.New')
                                    </a>
                                </div>
                            </div>
                            @endif
                            <table id="athletes" class="table table-hover table-workout">
                                <thead>
                                    <tr>
                                        <th>@lang('messages.Athlete')</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (Auth::guard('instructor')->user()->athletes as $athlete)
                                    <tr>
                                        <td>{{$athlete->first_name}} {{$athlete->last_name}}</td>
                                        <td>
                                            <a href="{{ route('instructor.athletes.show', ['instructor' => Auth::guard('instructor')->user(), 
                                                        'athlete' => $athlete]) }}" class="btn btn-warning btn-xs">
                                                <i class="fa fa-user"></i>
                                            </a>
                                            <a href="{{ route('instructor.athletes.edit', ['instructor' => Auth::guard('instructor')->user(), 
                                                                        'athlete' => $athlete]) }}" class="btn btn-primary btn-xs">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <button data-toggle="modal" data-target="#confirm-delete-modal" data-resource-id="{{$athlete->id}}" class="btn btn-danger btn-xs"> 
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
        var table = $('#athletes').DataTable( {
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
            });
       
            $('#confirm-delete-modal').on('show.bs.modal', function(e) {
            $('#modal-confirm').data('resource-id', $(e.relatedTarget).data('resource-id'));
        });

        $('#modal-confirm').on('click', function(e) {
            $.ajax({
                type: "post",
                data: {
                    _method: "DELETE",
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/athletes/" + $(this).data('resource-id'),
                success: function() {
                    location.reload();
                }
            });
        });
});
</script>
@endpush