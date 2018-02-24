@if(Auth::guard('athlete')->check())
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <p class="text-success">You are logged in as a user!</p>

@else
    <p class="text-danger">You are logged out as a user!</p>
@endif

@if(Auth::guard('admin')->check())
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <p class="text-success">You are logged in as a admin!</p>

@else
    <p class="text-danger">You are logged out as an admin!</p>
@endif

@if(Auth::guard('instructor')->check())
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <p class="text-success">You are logged in as an instructor!</p>

@else
    <p class="text-danger">You are logged out as an instructor!</p>
@endif