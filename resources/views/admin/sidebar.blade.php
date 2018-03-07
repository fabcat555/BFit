<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
        <p class="centered"><a href="{{route('admin.dashboard')}}"><img src="{{ asset('img/ui-sam.jpg') }}" class="img-circle" width="60"></a></p>
            <h5 class="centered">{{ Auth::guard('admin')->user()->first_name }} {{ Auth::guard('admin')->user()->last_name }}</h5>
            <h6 class="centered">@lang('messages.Admin')</h6>
            <li class="mt">
                <a class="active" href="{{route('admin.dashboard')}}">
                  <i class="fa fa-dashboard"></i>
                  <span>@lang('messages.Dashboard')</span>
              </a>
            </li>
            <li class="sub-menu">
                <a href="javascript:;">
                  <i class="fa fa-desktop"></i>
                  <span>@lang('messages.Athletes')</span>
              </a>
                <ul class="sub">
                    <li><a href="{{route('athletes.index')}}">@lang('messages.ManageAthletes')</a></li>
                    <li><a href="{{route('athletes.create')}}">@lang('messages.NewAthlete')</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;">
                  <i class="fa fa-cogs"></i>
                  <span>@lang('messages.Instructors')</span>
              </a>
                <ul class="sub">
                    <li><a href="{{route('instructors.index')}}">@lang('messages.ManageInstructors')</a></li>
                    <li><a href="{{route('instructors.create')}}">@lang('messages.NewInstructor')</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;">
                  <i class="fa fa-book"></i>
                  <span>@lang('messages.Memberships')</span>
                </a>
                <ul class="sub">
                    <li><a href="{{route('membership-types.index')}}">@lang('messages.ManageMembershipTypes')</a></li>
                    <li><a href="{{route('memberships.report.view')}}">@lang('messages.ViewMembershipReport')</a></li>
                </ul>
            </li>
        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>