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
                                        <th scope="row">@lang('messages.FirstName')</th>
                                        <td>{{ $instructor->first_name }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">@lang('messages.LastName')</th>
                                        <td>{{ $instructor->last_name }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">@lang('messages.BirthDate')</th>
                                        <td>{{ $instructor->birth_date->format('d/m/y') }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">@lang('messages.Email')</th>
                                        <td>{{ $instructor->email }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">@lang('messages.MembershipStartDate')</th>
                                        <td>{{ $instructor->created_at->format('d/m/y') }}</td>
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