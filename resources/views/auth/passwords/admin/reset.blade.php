<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <title>@lang('messages.AppHeadline') - @lang('messages.AdminResetHeadline')</title>
    <!-- Bootstrap core CSS -->
    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">
    <!--external css-->
    <link href="{{asset('font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{asset('css/style-responsive.css')}}" rel="stylesheet">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <div id="login-page">
        <div class="container">
            <form class="form-login" action="{{ route('admin.password.request') }}" method="POST">
                @csrf
                <h2 class="form-login-heading-blue">@lang('messages.AdminResetHeadline')</h2>
                <div class="login-wrap">
                    <input type="hidden" name="token" value="{{ $token }}">
                    <input type="email" id="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" autofocus>
                    <br>
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    <br>
                    <input type="password" name="password_confirmation" class="form-control" placeholder="@lang('messages.PasswordConfirmation')">
                    <button id="reset-submit" class="btn btn-login-blue btn-block" type="submit"></i> @lang('messages.Reset')</button>
                    @include('shared.errors')
                    @if(session('status'))
                        <div class="alert alert-success alert-created" role="alert">
                            <strong>{{ session('status') }}</strong>
                        </div>
                    @endif
            </form>
            </div>
        </div>
    </div>
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="{{asset('js/jquery-2.1.1.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="{{asset('js/jquery.backstretch.min.js')}}"></script>
    <script>
        $.backstretch("{{asset('/img/gym-bg.jpg')}}", {speed: 500});
    </script>
</body>
</html>