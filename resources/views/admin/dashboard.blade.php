@extends('layouts.master') 
@section('sidebar')
    @include('admin.sidebar')
@endsection
 
@section('content')
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <!-- First row -->
                <div class="row mt">
                    <div class="col-md-12 col-lg-6 mb">
                        <div class="white-panel pn personal-panel">
                            <div class="white-header">
                                <h5 class="personal-data-heading">@lang('messages.PersonalData')</h5>
                            </div>
                            <table class="table table-borderless table-personal">
                                <tbody>
                                    <tr>
                                        <th scope="row">@lang('messages.FirstName')</th>
                                        <td>{{ $admin->first_name }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">@lang('messages.LastName')</th>
                                        <td>{{ $admin->last_name }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">@lang('messages.BirthDate')</th>
                                        <td>{{ $admin->birth_date->format('d/m/y') }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">@lang('messages.Email')</th>
                                        <td>{{ $admin->email }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">@lang('messages.MembershipStartDate')</th>
                                        <td>{{ $admin->created_at->format('d/m/y') }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6 mb">
                        <!-- WHITE PANEL - TOP USER -->
                        <div class="white-panel pn membership-panel">
                            <div class="white-header">
                                <h5 class="panel-header">@lang('messages.MembershipTypesHeading')</h5>
                                <div class="db-btn-group">
                                    <a href="{{route('membership-types.create')}}" class="btn btn-primary btn-xs dashboard-btn">
                                        @lang('messages.New')
                                    </a>
                                    <a href="{{route('membership-types.index')}}" class="btn btn-primary btn-xs dashboard-btn">
                                        @lang('messages.ViewAll')
                                    </a>
                                </div>
                            </div>
                            <table class="table table-hover table-workout">
                                <thead>
                                    <tr>
                                        <th>@lang('messages.Membership')</th>
                                        <th>@lang('messages.Validity')</th>
                                        <th>@lang('messages.Price')</th>
                                </thead>
                                <tbody>
                                    @foreach ($membershipTypes as $membershipType)
                                    <tr>
                                        <td>{{$membershipType->name}}</td>
                                        <td>{{$membershipType->validity}}</td>
                                        <td>{{$membershipType->price}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /col-md-6 -->
                </div>
                <!-- /row -->
                <!-- Second row -->
                <div class="row mt">
                    <div class="col-md-12 mb">
                        <!-- WHITE PANEL - TOP USER -->
                        <div class="white-panel pn membership-panel">
                            <div class="white-header">
                                <h5 class="panel-header">@lang('messages.MembershipsHeading')</h5>
                                <div class="db-btn-group">
                                    <a href="{{route('memberships.create')}}" class="btn btn-primary btn-xs dashboard-btn">
                                        @lang('messages.New')
                                    </a>
                                    <a href="{{route('memberships.index')}}" class="btn btn-primary btn-xs dashboard-btn">
                                        @lang('messages.ViewAll')
                                    </a>
                                    <a href="{{route('memberships.report.view')}}" class="btn btn-primary btn-xs dashboard-btn">
                                        @lang('messages.ViewReport')
                                    </a>
                                </div>
                            </div>
                            <table class="table table-hover table-workout">
                                <thead>
                                    <tr>
                                        <th>@lang('messages.Athlete')</th>
                                        <th>@lang('messages.Type')</th>
                                        <th>@lang('messages.StartDate')</th>
                                        <th>@lang('messages.EndDate')</th>
                                </thead>
                                <tbody>
                                    @foreach ($memberships as $membership)
                                    <tr>
                                        <td>{{$membership->athlete->first_name}} {{$membership->athlete->last_name}}</td>
                                        <td>{{$membership->type->name}}</td>
                                        <td>{{$membership->start_date->format('d/m/y')}}</td>
                                        <td>{{$membership->end_date->format('d/m/y')}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /col-md-6 -->
                </div>
                <!-- /row -->
                <!-- Second row -->
                <div class="row mt">
                    <div class="col-md-12 col-lg-6 mb">
                        <!-- WHITE PANEL - TOP USER -->
                        <div class="white-panel pn membership-panel">
                            <div class="white-header">
                                <h5 class="panel-header">@lang('messages.AthletesHeading')</h5>
                                <div class="db-btn-group">
                                    <a href="{{route('athletes.create')}}" class="btn btn-primary btn-xs dashboard-btn">
                                            @lang('messages.New')
                                        </a>
                                    <a href="{{route('athletes.index')}}" class="btn btn-primary btn-xs dashboard-btn">
                                            @lang('messages.ViewAll')
                                        </a>
                                </div>
                            </div>
                            <table class="table table-hover table-workout">
                                <thead>
                                    <tr>
                                        <th>@lang('messages.Name')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($athletes as $athlete)
                                    <tr>
                                        <td>{{$athlete->first_name}} {{$athlete->last_name}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6 mb">
                        <!-- WHITE PANEL - TOP USER -->
                        <div class="white-panel pn membership-panel">
                            <div class="white-header">
                                <h5 class="panel-header">@lang('messages.InstructorsHeading')</h5>
                                <div class="db-btn-group">
                                    <a href="{{route('instructors.create')}}" class="btn btn-primary btn-xs dashboard-btn">
                                    @lang('messages.New')
                                </a>
                                    <a href="{{route('instructors.index')}}" class="btn btn-primary btn-xs dashboard-btn">
                                    @lang('messages.ViewAll')
                                </a>
                                </div>
                            </div>
                            <table class="table table-hover table-workout">
                                <thead>
                                    <tr>
                                        <th>@lang('messages.Name')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($instructors as $instructor)
                                    <tr>
                                        <td>{{$instructor->first_name}} {{$instructor->last_name}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /col-md-6 -->
                </div>
                <!-- /row -->
            </div>
            <!-- /col-lg-12 END SECTION MIDDLE -->
        </div>
    </section>
</section>
@endsection