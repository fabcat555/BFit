@extends('layouts.master') 
@section('sidebar')
    @include('instructor.sidebar')
@endsection
 
@section('topbar')
    @include('instructor.topbar')
@endsection
 
@section('title', __('messages.ExercisesIndex')) 
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
                                <h5 class="panel-header">@lang('messages.Exercises')</h5>
                                <div class="db-btn-group">
                                    <a href="{{route('exercises.create')}}" class="btn btn-primary btn-sm dashboard-btn">
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
                            <table id="exercises" class="table table-hover table-workout">
                                <thead>
                                    <tr>
                                        <th>@lang('messages.Exercise')</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($exercises as $exercise)
                                    <tr>
                                        <td>{{$exercise->name}}</td>
                                        <td>
                                            <a href="{{ route('exercises.show', ['exercise' => $exercise->id]) }}" class="btn btn-warning btn-xs">
                                                <i class="fa fa-list"></i>
                                            </a>
                                            <a href="{{ route('exercises.edit', ['exercise' => $exercise->id]) }}" class="btn btn-primary btn-xs">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <button data-toggle="modal" data-target="#confirm-delete-modal" data-resource-id="{{$exercise->id}}" class="btn btn-danger btn-xs"> 
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
    $(document).ready(function() {
        var languageUrl = "{{ App::isLocale('it') ? asset('js/datatables/i18n/Italian.json') : '' }}";
        var table = indexTable('#exercises', languageUrl);

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
                url: "/exercises/" + $(this).data('resource-id'),
                success: function() {
                    location.reload();
                }
            });
        });
       
    });
</script>
@endpush