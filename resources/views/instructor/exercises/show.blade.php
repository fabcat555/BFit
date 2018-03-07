@extends('layouts.master') 
@section('sidebar')
    @if(Auth::guard('instructor')->check())
        @include('instructor.sidebar')
    @else
        @include('athlete.sidebar')
    @endif
@endsection
 
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
                                <li class="list-group-item">{{ $step->description }}</li>
                            @endforeach
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- page end-->
    </section>
</section>
@endsection