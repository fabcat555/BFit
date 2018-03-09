@extends('layouts.master') 
@section('sidebar')
    @include('admin.sidebar')
@endsection
@section('topbar')
@include('admin.topbar')
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
                                <h5 class="panel-header">@lang('messages.AthletesHeading')</h5>
                                <div class="db-btn-group">
                                    <a href="{{route('instructor.athletes.create', ['instructor' => Auth::guard('instructor')->user()])}}" class="btn btn-primary btn-xs dashboard-btn">
                                        @lang('messages.New')
                                    </a>
                                </div>
                            </div>
                            @if(session('status'))
                            <div class="alert alert-success alert-created" role="alert">
                                <strong>{{ session('status') }}</strong>
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
                                            <a href="{{ route('athletes.show',$athlete->id) }}" class="btn btn-warning btn-xs">
                                                <i class="fa fa-user"></i>
                                            </a>
                                            <a href="{{ route('athletes.edit',$athlete->id) }}" class="btn btn-primary btn-xs">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <form method="POST" class="delete-athlete-form" action="{{ route('athletes.destroy', $athlete->id) }}">
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
        var table = $('#athletes').DataTable( {
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