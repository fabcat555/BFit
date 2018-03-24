@extends('layouts.master') 
@section('sidebar')
    @include('admin.sidebar')
@endsection
@section('topbar')
    @include('admin.topbar')
@endsection
@section('title', __('messages.MembershipTypeEdit'))

@section('content')
<section id="main-content">
    <section class="wrapper site-min-height">
        <h3 class="bm-section-heading">
            <i class="fa fa-angle-right"></i> @lang('messages.EditMembershipType')
        </h3>
        <!-- page start-->
        <div class="row mt">
            <div class="col-lg-12">
                <div class="form-panel">
                    @include('shared.errors')
                    <div id="athlete-form" class="panel panel-danger">
                        <div class="panel-heading">
                            <h3 class="panel-title">@lang('messages.MembershipTypeData')</h3>
                        </div>
                        <div class="panel-body">
                        <form method="POST" class="form-horizontal style-form" 
                            action="{{route('membership-types.update', $membershipType)}}">
                            @csrf
                            {{ method_field('put') }}
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">@lang('messages.Name')</label>
                                    <div class="col-sm-12">
                                    <input name="name" required type="text" class="form-control" value="{{ old('name', $membershipType->name) }}">
                                    </div>
                                </div>
                                <input type="hidden" name="athlete_id" value={{ $membershipType->validity }}>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">@lang('messages.Validity')</label>
                                    <div class="col-sm-12">
                                        <input name="validity" required type="number" min="1" class="form-control" value="{{ old('validity', $membershipType->validity) }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">@lang('messages.Price')</label>
                                    <div class="col-sm-12">
                                        <input name="price" required type="number" min="0" class="form-control" value="{{ old('price', $membershipType->price) }}">
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