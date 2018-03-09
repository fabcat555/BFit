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
                        <h4 class="bm-heading">
                            <i class="fa fa-angle-right"></i> {{ $technique->name }}
                        </h4>
                        <div class="panel-body">
                            <p class="technique-description">
                                {{ $technique->description }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        <!-- page end-->
    </section>
</section>
@endsection