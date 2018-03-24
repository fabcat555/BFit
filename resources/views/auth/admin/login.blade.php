<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <title>@lang('messages.AppHeadline') - @lang('messages.AdminLogin')</title>
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
            <form class="form-login" action="{{ route('admin.login.submit') }}" method="POST">
                @csrf
                <h2 class="form-login-heading-blue">@lang('messages.AdminLoginHeadline')</h2>
                <div class="login-wrap">
                    <input type="email" id="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" autofocus>
                    <br>
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    <label class="checkbox">
                        <label>
                            <input type="checkbox" name="remember"> @lang('messages.RememberMeLabel')
                         </label>
                        <span class="pull-right">
		                    <a data-toggle="modal" href="#myModal"> @lang('messages.ForgotPasswordLabel')</a>
		                </span>
                    </label>
                    <button class="btn btn-login-blue btn-block" href="index.html" type="submit"><i class="fa fa-lock"></i> @lang('messages.SignIn')</button>
                    @include('shared.errors')
                    <hr>
            </form>
            <div class="login-social-link centered">
                <p>@lang('messages.AdminAlternativeLoginHeadline')</p>
                <a href="{{route('login')}}" class="btn btn-danger" type="submit">@lang('messages.AthleteLogin')</a>
                <a href="{{route('instructor.login')}}" class="btn btn-warning" type="submit">@lang('messages.InstructorLogin')</a>
            </div>
            </div>
            <!-- Modal -->
            <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">@lang('messages.ForgotPasswordLabel')</h4>
                        </div>
                        <form action="" method="post">
                            <div class="modal-body">
                                <p>@lang('messages.ResetPasswordLabel')</p>
                                <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">
                            </div>
                            <div class="modal-footer">
                                <button data-dismiss="modal" class="btn btn-default" type="button">@lang('messages.CancelButton')</button>
                                <button class="btn btn-theme" type="button">@lang('messages.SubmitButton')</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- modal -->
        </div>
    </div>
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="{{asset('js/jquery-2.1.1.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="{{asset('js/jquery.backstretch.min.js')}}"></script>
    <script>
        $.backstretch("{{asset('/img/login-bg.jpg')}}", {speed: 500});
    </script>
</body>
</html>