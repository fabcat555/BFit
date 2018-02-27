<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
            <p class="centered"><a href="profile.html"><img src="{{ asset('img/ui-sam.jpg') }}" class="img-circle" width="60"></a></p>
            {{-- <h5 class="centered">{{ Auth::guard('instructor')->user()->name }}</h5> --}}
            <h5 class="centered">Fabio Catuogno</h5>
            <h6 class="centered">@lang('messages.Instructor')</h6>
            <li class="mt">
                <a class="active" href="index.html">
                  <i class="fa fa-dashboard"></i>
                  <span>@lang('messages.Dashboard')</span>
              </a>
            </li>
            <li class="sub-menu">
                <a href="javascript:;">
                  <i class="fa fa-desktop"></i>
                  <span>@lang('messages.Workout')</span>
              </a>
                <ul class="sub">
                    <li><a href="general.html">@lang('messages.NewWorkout')</a></li>
                    <li><a href="buttons.html">@lang('messages.ManageWOTypes')</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;">
                  <i class="fa fa-cogs"></i>
                  <span>@lang('messages.Athletes')</span>
              </a>
                <ul class="sub">
                    <li><a href="calendar.html">@lang('messages.ViewAssignedAthletes')</a></li>
                    <li><a href="gallery.html">@lang('messages.NewAthlete')</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;">
                  <i class="fa fa-book"></i>
                  <span>@lang('messages.Exercises')</span>
              </a>
                <ul class="sub">
                    <li><a href="blank.html">@lang('messages.ManageTechniques')</a></li>
                    <li><a href="login.html">@lang('messages.ViewExercises')</a></li>
                    <li><a href="lock_screen.html">@lang('messages.NewExercise')</a></li>
                </ul>
            </li>
        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>