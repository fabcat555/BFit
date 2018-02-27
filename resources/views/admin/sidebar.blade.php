<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
            <p class="centered"><a href="profile.html"><img src="{{ asset('img/ui-sam.jpg') }}" class="img-circle" width="60"></a></p>
            {{--  <h5 class="centered">{{ Auth::guard('admin')->user()->name }}</h5>  --}}
            <h5 class="centered">Fabio Catuogno</h5>
            <h6 class="centered">@lang('messages.Admin')</h6>
            <li class="mt">
                <a class="active" href="index.html">
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
                    <li><a href="general.html">@lang('messages.ManageAthletes')</a></li>
                    <li><a href="buttons.html">@lang('messages.NewAthlete')</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;">
                  <i class="fa fa-cogs"></i>
                  <span>@lang('messages.Instructors')</span>
              </a>
                <ul class="sub">
                    <li><a href="calendar.html">@lang('messages.ManageInstructors')</a></li>
                    <li><a href="gallery.html">@lang('messages.NewInstructor')</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;">
                  <i class="fa fa-book"></i>
                  <span>@lang('messages.Memberships')</span>
                </a>
                <ul class="sub">
                    <li><a href="blank.html">@lang('messages.ManageMembershipTypes')</a></li>
                    <li><a href="login.html">@lang('messages.ViewMembershipReport')</a></li>
                </ul>
            </li>
        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>