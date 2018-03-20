@extends('layouts.master') 
@section('sidebar')
    @include('admin.sidebar')
@endsection
@section('topbar')
    @include('admin.topbar')
@endsection
@section('title', __('messages.MembershipCreate'))

@section('content')
<section id="main-content">
    <section class="wrapper site-min-height">
        <h3 class="bm-section-heading">
            <i class="fa fa-angle-right"></i> @lang('messages.NewMembership')
        </h3>
        <!-- page start-->
        <div class="row mt">
            <div class="col-lg-12">
                <div class="form-panel">
                    @include('shared.errors')
                    <div id="athlete-form" class="panel panel-danger">
                        <div class="panel-heading">
                            <h3 class="panel-title">@lang('messages.MembershipData')</h3>
                        </div>
                        <div class="panel-body">
                        <form class="form-horizontal style-form" method="post" action="{{route('memberships.store')}}">
                            @csrf
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">@lang('messages.Athlete')</label>
                                    <div class="col-sm-6">
                                        <select name="athlete_id" required class="selectpicker" data-live-search="true">
                                            @foreach($athletes as $athlete)
                                            <option value="{{$athlete->id}}">{{$athlete->first_name}} {{$athlete->last_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">@lang('messages.Exercise')</label>
                                    <div class="col-sm-6">
                                        <select name="type_id" required class="form-control">
                                            @foreach($membershipTypes as $membershipType)
                                            <option value="{{$membershipType->id}}">{{$membershipType->name}}</option>
                                            @endforeach
                                        </select>
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