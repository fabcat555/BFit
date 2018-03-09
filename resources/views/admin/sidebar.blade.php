<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
        <p class="centered"><a href="{{route('admin.dashboard')}}"><img src="{{ asset('img/ui-sam.jpg') }}" class="img-circle" width="60"></a></p>
            <h5 class="centered">{{ Auth::guard('admin')->user()->first_name }} {{ Auth::guard('admin')->user()->last_name }}</h5>
            <h6 class="centered">@lang('messages.Admin')</h6>
            <li class="mt">
                <a class="{{ isActiveRoute('admin.dashboard') }}" href="{{route('admin.dashboard')}}">
                  <i class="fa fa-dashboard"></i>
                  <span>@lang('messages.Dashboard')</span>
              </a>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" class="{{ areActiveRoutes(['athletes.*']) }}">
                  <i class="fa fa-desktop"></i>
                  <span>@lang('messages.Athletes')</span>
                </a>
                <ul class="sub">
                    <li class="{{ isActiveRoute('athletes.index') }}"><a href="{{route('athletes.index')}}">@lang('messages.ManageAthletes')</a></li>
                    <li class="{{ isActiveRoute('athletes.create') }}"><a href="{{route('athletes.create')}}">@lang('messages.NewAthlete')</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a class="{{ areActiveRoutes(['instructors.*']) }}" href="javascript:;">
                  <i class="fa fa-cogs"></i>
                  <span>@lang('messages.Instructors')</span>
                </a>
                <ul class="sub">
                    <li class="{{ isActiveRoute('instructors.index') }}"><a href="{{route('instructors.index')}}">@lang('messages.ManageInstructors')</a></li>
                    <li class="{{ isActiveRoute('instructors.create') }}"><a href="{{route('instructors.create')}}">@lang('messages.NewInstructor')</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" class="{{ areActiveRoutes(['memberships.report.view', 'membership-types.index']) }}">
                  <i class="fa fa-book"></i>
                  <span>@lang('messages.Memberships')</span>
                </a>
                <ul class="sub">
                    <li class="{{ isActiveRoute('membership-types.index') }}"><a href="{{route('membership-types.index')}}">@lang('messages.ManageMembershipTypes')</a></li>
                    <li class="{{ isActiveRoute('memberships.report.view') }}"><a href="{{route('memberships.report.view')}}">@lang('messages.ViewMembershipReport')</a></li>
                </ul>
            </li>
        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>