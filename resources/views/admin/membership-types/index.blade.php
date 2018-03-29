@extends('layouts.master')

@section('sidebar')
    @include('admin.sidebar')
@endsection
 
@section('topbar')
    @include('admin.topbar')
@endsection
 
@section('title', __('messages.MembershipTypesIndex'))

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
                                <h5 class="panel-header">{{Str::upper(__('messages.MembershipTypes'))}}</h5>
                                <div class="db-btn-group">
                                    <a href="{{route('membership-types.create')}}" class="btn btn-primary btn-sm dashboard-btn">
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
                            <table id="membership-types" class="table table-hover table-workout">
                                <thead>
                                    <tr>
                                        <th>@lang('messages.Name')</th>
                                        <th>@lang('messages.Validity')</th>
                                        <th>@lang('messages.Price')</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($membershipTypes as $membershipType)
                                    <tr>
                                        <td>{{$membershipType->name}}</td>
                                        <td>{{$membershipType->validity}}</td>
                                        <td>{{$membershipType->price}}</td>
                                        <td>
                                            <a href="{{ route('membership-types.edit', $membershipType) }}" class="btn btn-primary btn-xs">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <button data-toggle="modal" data-target="#confirm-delete-modal" data-resource-id="{{$membershipType->id}}" class="btn btn-danger btn-xs"> 
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
@include('shared.modals.confirm-delete')
@endsection
 
@push('script')
<script src="{{asset('js/datatables-helper.js')}}"></script>
<script>
    $(document).ready(function(){
        var languageUrl = "{{ App::isLocale('it') ? asset('js/datatables/i18n/Italian.json') : '' }}";
        var table = indexTable('#membership-types', languageUrl);
        
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
                url: "/membership-types/" + $(this).data('resource-id'),
                success: function() {
                    location.reload();
                }
            });
        });
    });
</script>
@endpush