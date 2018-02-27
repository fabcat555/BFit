@extends('layouts.master') 
@section('sidebar')
    @include('athlete.sidebar')
@endsection
 
@section('content')
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12 main-chart">
                <div class="row">
                    <div class="col-md-12 col-sm-12 mb">
                        <!-- WORKOUT PANEL -->
                        <div class="grey-panel pn">
                            <div class="grey-header">
                                <h5 class="black-heading">@lang('messages.AssignedWorkout')</h5>
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
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Squat</td>
                                        <td>3</td>
                                        <td>8</td>
                                        <td>90</td>
                                        <td>Superset</td>
                                        <td>
                                            <button class="btn btn-warning btn-xs"><i class="fa fa-bar-chart-o"></i></button>
                                            <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Squat</td>
                                        <td>3</td>
                                        <td>8</td>
                                        <td>90</td>
                                        <td>Superset</td>
                                        <td>
                                            <button class="btn btn-warning btn-xs"><i class="fa fa-bar-chart-o"></i></button>
                                            <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Squat</td>
                                        <td>3</td>
                                        <td>8</td>
                                        <td>90</td>
                                        <td>Superset</td>
                                        <td>
                                            <button class="btn btn-warning btn-xs"><i class="fa fa-bar-chart-o"></i></button>
                                            <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <br>
                        </div>
                    </div>
                    <!-- /col-md-12 -->
                </div>
                <!-- /row -->
            </div>
            <!-- /col-lg-12 END SECTION MIDDLE -->
        </div>
    </section>
</section>
@endsection