<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
            <p class="centered"><a href="profile.html"><img src="{{ asset('img/ui-sam.jpg') }}" class="img-circle" width="60"></a></p>
            <h5 class="centered">Fabio Catuogno</h5>
            <h6 class="centered">@lang('messages.Athlete')</h6>
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
                        <li><a href="general.html">@lang('messages.AssignedWorkout')</a></li>
                    <li><a href="general.html">@lang('messages.WorkoutHistory')</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;">
                  <i class="fa fa-cogs"></i>
                  <span>@lang('messages.BodyMeasurements')</span>
              </a>
                <ul class="sub">
                    <li><a href="calendar.html">@lang('messages.ViewHistory')</a></li>
                    <li><a href="gallery.html">@lang('messages.NewBodyMeasurement')</a></li>
                </ul>
            </li>
        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>