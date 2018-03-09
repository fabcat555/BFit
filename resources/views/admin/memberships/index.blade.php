@extends('layouts.master') 
@section('sidebar')
    @include('admin.sidebar')
@endsection
 
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
                            <div class="white-header">
                                <h5 class="panel-header">@lang('messages.MembershipTypes')</h5>
                                <div class="db-btn-group">
                                    <a href="{{route('memberships.create')}}" class="btn btn-primary btn-xs dashboard-btn">
                                        @lang('messages.New')
                                    </a>
                                </div>
                            </div>
                            @if(session('status'))
                            <div class="alert alert-success alert-created" role="alert">
                                <strong>{{ session('status') }}</strong>
                            </div>
                            @endif
                            <table id="memberships" class="table table-hover table-workout">
                                <thead>
                                    <tr>
                                        <th>@lang('messages.Athlete')</th>
                                        <th>@lang('messages.Type')</th>
                                        <th>@lang('messages.MembershipStatus')</th>
                                        <th>@lang('messages.StartDate')</th>
                                        <th>@lang('messages.EndDate')</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($memberships as $membership)
                                    <tr>
                                        <td>{{$membership->athlete->first_name}} {{$membership->athlete->last_name}}</td>
                                        <td>{{$membership->type->name}}</td>
                                        <td>{{$membership->end_date > Carbon\Carbon::now() ? __('messages.Active') : __('messages.NotActive')}}</td>
                                        <td>{{$membership->start_date->format('d/m/y')}}</td>
                                        <td>{{$membership->end_date->format('d/m/y')}}</td>
                                        <td>
                                            <form method="POST" class="delete-athlete-form" action="{{ route('memberships.destroy', $membership) }}">
                                                @csrf {{ method_field('delete') }}
                                                <button class="btn btn-danger btn-xs" type="submit"> 
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </form>
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
@endsection

@push('script')
<script>
    $(document).ready(function(){
        var table = $('#memberships').DataTable( {
            info: false,
            buttons: [
                'copy', 'excel', 'pdf'
            ],
            initComplete: function () {
                setTimeout( function () {
                     table.buttons().container().appendTo( $('.col-sm-5', table.table().container() ) );
                }, 10 );
            }
    } );
});
</script>
@endpush