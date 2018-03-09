@extends('layouts.master') 
@section('sidebar')
    @include('admin.sidebar')
@endsection
@section('topbar')
    @include('admin.topbar')
@endsection
@section('title', __('messages.MembershipTypeCreate'))

@section('content')
<section id="main-content">
    <section class="wrapper site-min-height">
        <h3 class="bm-section-heading">
            <i class="fa fa-angle-right"></i> @lang('messages.NewMembershipType')
        </h3>
        <!-- page start-->
        <div class="row mt">
            <div class="col-lg-12">
                <div class="form-panel">
                    @include('shared.errors')
                    <div id="athlete-form" class="panel panel-default">
                        <div class="panel-heading">@lang('messages.MembershipTypeData')</div>
                        <div class="panel-body">
                        <form class="form-horizontal style-form" method="post" action="{{route('membership-types.store')}}">
                            @csrf
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">@lang('messages.Name')</label>
                                    <div class="col-sm-12">
                                        <input name="name" required type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">@lang('messages.Validity')</label>
                                    <div class="col-sm-12">
                                        <input name="validity" required type="number" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">@lang('messages.Price')</label>
                                    <div class="col-sm-12">
                                        <input name="price" required type="number" class="form-control">
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