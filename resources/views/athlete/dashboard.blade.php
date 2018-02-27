@extends('layouts.master') 

@section('sidebar')
    @include('athlete.sidebar')
@endsection
 
@section('content')
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12 main-chart">
                <!-- First row -->
                <div class="row mt">
                    <div class="col-md-6 col-sm-6 mb">
                        <div class="white-panel pn">
                            <div class="white-header">
                                <h5 class="personal-data-heading black-heading">@lang('messages.PersonalData')</h5>
                                <button class="btn btn-primary btn-xs edit-personal">
                                    <i class="fa fa-pencil"></i>
                                </button>
                            </div>
                            <table class="table table-borderless table-personal">
                                <tbody>
                                    <tr>
                                        <th scope="row">@lang('messages.FirstName')</th>
                                        <td>Fabio</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">@lang('messages.LastName')</th>
                                        <td>Catuogno</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">@lang('messages.BirthDate')</th>
                                        <td>12/12/1990</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">@lang('messages.Gender')</th>
                                        <td>M</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">@lang('messages.Height')</th>
                                        <td>180</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 mb">
                        <!-- WHITE PANEL - TOP USER -->
                        <div class="white-panel pn">
                            <div class="white-header">
                                <h5 class="black-heading">@lang('messages.MembershipHeading')</h5>
                            </div>
                            <table class="table table-borderless table-description">
                                <tbody>
                                    <tr>
                                        <th scope="row">@lang('messages.Type')</th>
                                        <td>Monthly</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">@lang('messages.MembershipStatus')</th>
                                        <td>Active</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">@lang('messages.MembershipValidity')</th>
                                        <td>23/02/2018</td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="small mt">@lang('messages.MembershipStartYear')</p>
                                    <p>2012</p>
                                </div>
                                <div class="col-md-6">
                                    <p class="small mt">@lang('messages.MembershipCost')</p>
                                    <p>$ 47,60</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /col-md-6 -->
                </div>
                <!-- /row -->
                <!-- Second row -->
                <div class="row">
                    <!-- /col-md-4 -->
                    <div class="col-md-6 col-sm-6 mb">
                        <!-- INSTAGRAM PANEL -->
                        <div class="grey-panel pn workout-panel">
                            <div class="grey-header">
                                <h5 class="wo-heading black-heading">@lang('messages.AssignedWorkout')</h5>
                                <button type="button" class="btn btn-primary btn-xs dashboard-btn">@lang('messages.ViewHistory')</button>
                            </div>
                            <table class="table table-borderless table-description">
                                <tbody>
                                    <tr>
                                        <th scope="row">@lang('messages.Type')</th>
                                        <td>Monthly</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">@lang('messages.StartDate')</th>
                                        <td>Active</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">@lang('messages.EndDate')</th>
                                        <td>23/02/2018</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-hover table-workout">
                                <thead>
                                    <tr>
                                        <th>@lang('messages.Exercise')</th>
                                        <th>@lang('messages.Sets')</th>
                                        <th>@lang('messages.Reps')</th>
                                        <th>@lang('messages.Rest')</th>
                                        <th>@lang('messages.Technique')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Squat</td>
                                        <td>3</td>
                                        <td>8</td>
                                        <td>90</td>
                                        <td>Superset</td>
                                    </tr>
                                   <tr>
                                        <td>Squat</td>
                                        <td>3</td>
                                        <td>8</td>
                                        <td>90</td>
                                        <td>Superset</td>
                                    </tr>
                                    <tr>
                                        <td>Squat</td>
                                        <td>3</td>
                                        <td>8</td>
                                        <td>90</td>
                                        <td>Superset</td>
                                    </tr>
                                    <tr>
                                        <td>Squat</td>
                                        <td>3</td>
                                        <td>8</td>
                                        <td>90</td>
                                        <td>Superset</td>
                                    </tr>
                                    <tr>
                                        <td>Squat</td>
                                        <td>3</td>
                                        <td>8</td>
                                        <td>90</td>
                                        <td>Superset</td>
                                    </tr>
                                    <tr>
                                        <td>Squat</td>
                                        <td>3</td>
                                        <td>8</td>
                                        <td>90</td>
                                        <td>Superset</td>
                                    </tr>
                                </tbody>
                            </table>
                            <br>
                        </div>
                    </div>
                    <!-- /col-md-4 -->
                    <div class="col-md-6 col-sm-6 mb">
                        <!-- REVENUE PANEL -->
                        <div class="darkblue-panel pn bm-panel">
                            <div class="darkblue-header">
                                <h5 class="wo-heading">@lang('messages.BodyMeasurementsHeading')</h5>
                                <button type="button" class="btn btn-primary btn-xs dashboard-btn">@lang('messages.New')</button>
                                <button type="button" class="btn btn-primary btn-xs dashboard-btn">@lang('messages.ViewAll')</button>
                            </div>
                            <div class="panel-body">
                                <div id="hero-bar" class="graph"></div>
                            </div>
                            <p class="mt">Peso</p>
                        </div>
                    </div>
                    <!-- /col-md-4 -->
                </div>
                <!-- /row -->
            </div>
            <!-- /col-lg-12 END SECTION MIDDLE -->
        </div>
    </section>
</section>
@endsection