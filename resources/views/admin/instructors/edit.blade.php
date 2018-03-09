@extends('layouts.master') 
@section('sidebar')
    @include('admin.sidebar')
@endsection
@section('topbar')
@include('admin.topbar')
@endsection

@section('content')
<section id="main-content">
    <section class="wrapper site-min-height">
        <h3 class="bm-section-heading">
            <i class="fa fa-angle-right"></i> @lang('messages.NewAthlete')
        </h3>
        <!-- page start-->
        <div class="row mt">
            <div class="col-lg-12">
                <div class="form-panel">
                    @include('shared.errors')
                    <div id="athlete-form" class="panel panel-default">
                        <div class="panel-heading">@lang('messages.AthletePersonals')</div>
                        <div class="panel-body">
                        <form method="POST" class="form-horizontal style-form" 
                            action="{{route('instructors.update', $instructor->id)}}">
                            @csrf
                            {{ method_field('put') }}
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">@lang('messages.FirstName')</label>
                                    <div class="col-sm-12">
                                    <input name="first_name" required type="text" class="form-control" value="{{ old('first_name', $instructor->first_name) }}">
                                    </div>
                                </div>
                                <input type="hidden" name="athlete_id" value={{ $instructor->id }}>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">@lang('messages.LastName')</label>
                                    <div class="col-sm-12">
                                        <input name="last_name" required type="text" class="form-control" value="{{ old('last_name', $instructor->last_name) }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">@lang('messages.BirthDate')</label>
                                    <div class="col-sm-12">
                                        <input name="birth_date" required type="date" class="form-control" value="{{ old('birth_date', $instructor->birth_date->format('Y-m-d')) }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">@lang('messages.Email')</label>
                                    <div class="col-sm-12">
                                        <input name="email" required type="email" class="form-control" value="{{ old('email', $instructor->email) }}">
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