@extends('layouts.master') 
@section('sidebar')
    @include('instructor.sidebar')
@endsection

@section('topbar')
    @include('instructor.topbar')
@endsection

@section('title', __('messages.AthleteCreate'))
 
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
                    <div id="athlete-form" class="panel panel-danger">
                        <div class="panel-heading">
                            <h3 class="panel-title">@lang('messages.AthletePersonals')</h3>
                        </div>
                        <div class="panel-body">
                        <form class="form-horizontal style-form" method="post"
                            action="{{route('instructor.athletes.store', Auth::guard('instructor')->user())}}">
                            @csrf
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">@lang('messages.FirstName')</label>
                                    <div class="col-sm-12">
                                        <input name="first_name" type="text" required class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">@lang('messages.LastName')</label>
                                    <div class="col-sm-12">
                                        <input name="last_name" type="text" required class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">@lang('messages.BirthDate')</label>
                                    <div class="col-sm-12">
                                        <input name="birth_date" type="date" required class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">@lang('messages.Email')</label>
                                    <div class="col-sm-12">
                                        <input name="email" type="email" required class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">@lang('messages.Password')</label>
                                    <div class="col-sm-12">
                                        <input name="password" type="password" required class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">@lang('messages.PasswordConfirmation')</label>
                                    <div class="col-sm-12">
                                        <input name="password_confirmation" required type="password" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group gender-input">
                                    <label class="radio-inline">
                                        <input name="gender" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="M" checked> M
                                    </label>
                                    <label class="radio-inline">
                                        <input name="gender" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="F"> F
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">@lang('messages.Height')</label>
                                    <div class="col-sm-12">
                                        <input name="height" required type="number" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">@lang('messages.Notes')</label>
                                    <div class="col-sm-12">
                                        <textarea name="notes" class="form-control"></textarea>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary pull-right">Register</button>
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