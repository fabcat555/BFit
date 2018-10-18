@extends('layouts.master') 
@section('sidebar')
    @include('instructor.sidebar')
@endsection
 
@section('topbar')
    @include('instructor.topbar')
@endsection
 
@section('title', __('messages.WorkoutTypesIndex')) 
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
                                <h5 class="panel-header">{{ Str::upper(__('messages.WorkoutTypes')) }}</h5>
                                <div class="db-btn-group">
                                    <a href="{{route('workout-types.create')}}" class="btn btn-sm btn-danger dashboard-btn">
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
                            <table id="workout-types" class="table table-hover table-workout">
                                <thead>
                                    <tr>
                                        <th>@lang('messages.WorkoutType')</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($workoutTypes as $wt)
                                    <tr>
                                        <td>{{$wt->name}}</td>
                                        <td>
                                            <a href="{{ route('workout-types.show', $wt->id) }}" class="btn btn-warning btn-xs">
                                                <i class="fa fa-list"></i>
                                            </a>
                                            <a href="{{ route('workout-types.edit', $wt->id) }}" class="btn btn-primary btn-xs">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <button data-toggle="modal" data-target="#confirm-delete-modal" data-resource-id="{{$wt->id}}" class="btn btn-danger btn-xs"> 
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
        var table = indexTable('#workout-types', languageUrl);

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
                url: "/workout-types/" + $(this).data('resource-id'),
                success: function() {
                    location.reload();
                }
            });
        });
       
});
</script>
@endpush