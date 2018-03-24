@extends('layouts.master') 

@section('sidebar')
    @include('admin.sidebar')
@endsection
 
@section('topbar')
    @include('admin.topbar')
@endsection
 
@section('title', __('messages.AthleteShow'))

@section('content')
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <!-- First row -->
                <div class="row mt">
                    <div class="col-md-12 mb">
                        <div class="white-panel pn personal-panel">
                            <div class="panel-header-red">
                                <h5 class="panel-header">@lang('messages.PersonalData')</h5>
                                <div class="db-btn-group">
                                    <a href="{{route('athletes.edit', $athlete->id)}}" class="btn btn-primary btn-sm dashboard-btn">
                                        <i class="fa fa-pencil"></i>
                                        @lang('messages.Edit')
                                    </a>
                                    <button data-toggle="modal" data-target="#confirm-delete-modal" data-resource-id="{{$athlete->id}}" class="btn btn-primary btn-sm dashboard-btn"> 
                                        <i class="fa fa-times"></i>
                                        @lang('messages.Delete')
                                    </button>
                                </div>
                            </div>
                            @if(session('status'))
                            <div class="alert alert-success alert-created" role="alert">
                                <strong>{{ session('status') }}</strong>
                            </div>
                            @endif
                            <table class="table table-borderless table-personal">
                                <tbody>
                                    <tr>
                                        <th scope="row">@lang('messages.FirstName')</th>
                                        <td>{{ $athlete->first_name }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">@lang('messages.LastName')</th>
                                        <td>{{ $athlete->last_name }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">@lang('messages.BirthDate')</th>
                                        <td>{{ $athlete->birth_date->format('d/m/y') }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">@lang('messages.Email')</th>
                                        <td>{{ $athlete->email }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">@lang('messages.MembershipStartDate')</th>
                                        <td>{{ $athlete->created_at->format('d/m/y') }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">@lang('messages.Notes')</th>
                                        <td>@if(!empty($athlete->notes)) {{ $athlete->notes }} @else - @endif</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">@lang('messages.Instructor')</th>
                                        <td>
                                            @if (isset($athlete->instructor)) {{ $athlete->instructor->first_name . ' ' . $athlete->instructor->last_name }} @else -
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
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
    $(document).ready(function() {
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
                url: "/athletes/" + $(this).data('resource-id'),
                success: function() {
                    window.location.replace('/athletes');
                }
            });
        });
    });
</script>
@endpush