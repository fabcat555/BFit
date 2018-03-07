@extends('layouts.master') 
@section('sidebar')
    @include('admin.sidebar')
@endsection
 
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
                    <div id="athlete-form" class="panel panel-default">
                        <div class="panel-heading">@lang('messages.MembershipData')</div>
                        <div class="panel-body">
                        <form class="form-horizontal style-form" method="post" action="{{route('memberships.store')}}">
                            @csrf
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">@lang('messages.Athlete')</label>
                                    <div class="col-sm-6">
                                        <select name="athlete_id" class="form-control">
                                            @foreach($athletes as $athlete)
                                            <option value="{{$athlete->id}}">{{$athlete->first_name}} {{$athlete->last_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">@lang('messages.Exercise')</label>
                                    <div class="col-sm-6">
                                        <select name="type_id" class="form-control">
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