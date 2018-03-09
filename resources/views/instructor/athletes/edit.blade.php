@extends('layouts.master') 

@section('sidebar')
    @include('instructor.sidebar')
@endsection

@section('topbar')
    @include('instructor.topbar')
@endsection

@section('title', __('messages.AthleteEdit'))
 
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
                            action="{{route('instructor.athletes.update', ['instructor' => Auth::guard('instructor')->user(), 
                            'athlete' => $athlete])}}">
                            @csrf
                            {{ method_field('put') }}
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">@lang('messages.FirstName')</label>
                                    <div class="col-sm-12">
                                    <input name="first_name" type="text" required class="form-control" value="{{ old('first_name', $athlete->first_name) }}">
                                    </div>
                                </div>
                                <input type="hidden" name="athlete_id" value={{ $athlete->id }}>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">@lang('messages.LastName')</label>
                                    <div class="col-sm-12">
                                        <input name="last_name" type="text" required class="form-control" value="{{ old('last_name', $athlete->last_name) }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">@lang('messages.BirthDate')</label>
                                    <div class="col-sm-12">
                                        <input name="birth_date" type="date" required class="form-control" value="{{ old('birth_date', $athlete->birth_date->format('Y-m-d')) }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">@lang('messages.Email')</label>
                                    <div class="col-sm-12">
                                        <input name="email" type="email" required class="form-control" value="{{ old('email', $athlete->email) }}">
                                    </div>
                                </div>
                                <div class="form-group gender-input">
                                    <label class="radio-inline">
                                        <input name="gender" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="M" {{ $athlete->gender=='M' ? 'checked' : '' }}> M
                                    </label>
                                    <label class="radio-inline">
                                        <input name="gender" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="F" {{ $athlete->gender == 'F' ? 'checked' : '' }}> F
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">@lang('messages.Height')</label>
                                    <div class="col-sm-12">
                                        <input name="height" type="number" required class="form-control" value="{{ old('height', $athlete->height) }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">@lang('messages.Notes')</label>
                                    <div class="col-sm-12">
                                        <textarea name="notes" class="form-control"> {{ old('notes', $athlete->notes) }} </textarea>
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