@extends('layouts.master') 
@section('sidebar')
    @include('athlete.sidebar')
@endsection
 
@section('content')
<section id="main-content">
    <section class="wrapper site-min-height">
        <h3 class="bm-section-heading">
            <i class="fa fa-angle-right"></i> @lang('messages.BodyMeasurements')
        </h3>
        <button type="button" class="btn btn-primary">@lang('messages.New')</button>
        <!-- page start-->
        <div id="morris">
            <div class="row mt">
                <div class="col-lg-12">
                    <div class="content-panel">
                        <h4 class="bm-heading">
                            <i class="fa fa-angle-right"></i> Peso
                        </h4>
                        <div class="panel-body">
                            <div id="hero-bar" class="graph"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- page end-->
    </section>
</section>
@endsection