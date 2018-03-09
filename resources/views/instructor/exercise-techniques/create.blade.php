@extends('layouts.master') 

@section('sidebar')
    @include('instructor.sidebar')
@endsection

@section('topbar')
    @include('instructor.topbar')
@endsection
 
@section('title', __('messages.ExerciseTechniqueCreate'))

@section('content')
<section id="main-content">
    <section class="wrapper site-min-height">
        <h3 class="bm-section-heading">
            <i class="fa fa-angle-right"></i> @lang('messages.NewExerciseTechnique')
        </h3>
        <!-- page start-->
        <div class="row mt">
            <div class="col-lg-12">
                <div class="form-panel">
                    @include('shared.errors')
                    <div id="athlete-form" class="panel panel-default">
                        <div class="panel-heading">@lang('messages.ExerciseTechniqueData')</div>
                        <div class="panel-body">
                            <form class="form-horizontal style-form" method="post" action="{{route('exercise-techniques.store')}}">
                                @csrf
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">@lang('messages.Name')</label>
                                    <div class="col-sm-12">
                                        <input name="name" required type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">@lang('messages.Description')</label>
                                    <div class="col-sm-12">
                                        <textarea name="description" class="form-control"></textarea>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary pull-right">@lang('messages.Register')</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- col-lg-12-->
        </div>
        <!-- page end-->
    </section>
</section>
@endsection