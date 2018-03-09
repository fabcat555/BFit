@extends('layouts.master') 
@section('sidebar')
    @include('admin.sidebar')
@endsection
@section('topbar')
    @include('admin.topbar')
@endsection
@section('title', __('messages.MembershipTypeShow'))

@section('content')
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <!-- First row -->
                <div class="row mt">
                    <div class="col-md-12 mb">
                        <div class="white-panel pn personal-panel">
                            <div class="white-header">
                                <h5 class="personal-data-heading">@lang('messages.PersonalData')</h5>
                            </div>
                            @if(session('status'))
                            <div class="alert alert-success alert-created" role="alert">
                                <strong>{{ session('status') }}</strong>
                            </div>
                            @endif
                            <table class="table table-borderless table-personal">
                                <tbody>
                                    <tr>
                                        <th scope="row">@lang('messages.Name')</th>
                                        <td>{{ $membershipType->name }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">@lang('messages.Validity')</th>
                                        <td>{{ $membershipType->validity }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">@lang('messages.Price')</th>
                                        <td>{{ $membershipType->price }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /row -->
            </div>
        </div>
    </section>
</section>
@endsection