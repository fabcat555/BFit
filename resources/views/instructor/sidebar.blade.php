<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
            <p class="centered"><a href="{{route('instructor.dashboard')}}"><img src="{{ asset('img/ui-sam.jpg') }}" class="img-circle" width="60"></a></p>
            <h5 class="centered">{{ Auth::guard('instructor')->user()->first_name }} {{ Auth::guard('instructor')->user()->last_name }}</h5>
            <h6 class="centered">@lang('messages.Instructor')</h6>
            <li class="mt">
                <a class="{{ isActiveRoute('instructor.dashboard') }}" href="{{route('instructor.dashboard')}}">
                  <i class="fa fa-dashboard"></i>
                  <span>@lang('messages.Dashboard')</span>
              </a>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" class="{{ isActiveMatch('workout') }}">
                  <i class="fa fa-desktop"></i>
                  <span>@lang('messages.Workout')</span>
              </a>
                <ul class="sub">
                    <li class="{{ isActiveRoute('workouts.create') }}"><a href={{ route('workouts.create') }}>@lang('messages.NewWorkout')</a></li>
                    <li class="{{ isActiveRoute('workout-types.index') }}"><a href="{{ route('workout-types.index' )}}">@lang('messages.ManageWOTypes')</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a class="{{ areActiveRoutes(['instructor.athletes.*']) }}" href="javascript:;">
                  <i class="fa fa-cogs"></i>
                  <span>@lang('messages.Athletes')</span>
              </a>
                <ul class="sub">
                    <li class="{{ isActiveRoute('instructor.athletes.index') }}"><a href="{{route('instructor.athletes.index', Auth::guard('instructor')->user()->id)}}">@lang('messages.ViewAssignedAthletes')</a></li>
                    <li class="{{ isActiveRoute('instructor.athletes.create') }}"><a href="{{route('instructor.athletes.create', Auth::guard('instructor')->user()->id)}}">@lang('messages.NewAthlete')</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a class="{{ isActiveMatch('exercise') }}" href="javascript:;">
                  <i class="fa fa-book"></i>
                  <span>@lang('messages.Exercises')</span>
              </a>
                <ul class="sub">
                    <li class="{{ isActiveRoute('exercises.index') }}"><a href="{{route('exercises.index')}}">@lang('messages.ManageExercises')</a></li>
                    <li class="{{ isActiveRoute('exercise-techniques.index') }}"><a href="{{route('exercise-techniques.index')}}">@lang('messages.ManageTechniques')</a></li>
                    <li class="{{ isActiveRoute('exercises.create') }}"><a href="{{route('exercises.create')}}">@lang('messages.NewExercise')</a></li>
                </ul>
            </li>
        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>