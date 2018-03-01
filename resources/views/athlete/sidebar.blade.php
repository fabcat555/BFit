<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
            <p class="centered"><a href="{{route('dashboard')}}"><img src="{{ asset('img/ui-sam.jpg') }}" class="img-circle" width="60"></a></p>
            <h5 class="centered">{{ Auth::guard('athlete')->user()->first_name . ' ' . Auth::guard('athlete')->user()->last_name }}</h5>
            <h6 class="centered">@lang('messages.Athlete')</h6>
            <li class="mt">
                <a class="active" href="{{route('dashboard')}}">
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
                    <li><a href="{{route('workout')}}">@lang('messages.AssignedWorkout')</a></li>
                    <li><a href="{{route('workout.history')}}">@lang('messages.WorkoutHistory')</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;">
                  <i class="fa fa-cogs"></i>
                  <span>@lang('messages.BodyMeasurements')</span>
              </a>
                <ul class="sub">
                    <li><a href="{{route('bodymeasurements')}}">@lang('messages.ViewHistory')</a></li>
                </ul>
            </li>
        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>