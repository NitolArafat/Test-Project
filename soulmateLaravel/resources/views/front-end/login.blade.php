<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Login - Bootstrap Admin Template</title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes"> 

        <link href="{{asset('/')}}front-end/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="{{asset('/')}}front-end/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css" />

        <link href="{{asset('/')}}front-end/css/font-awesome.css" rel="stylesheet">
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">

        <link href="{{asset('/')}}front-end/css/style.css" rel="stylesheet" type="text/css">
        <link href="{{asset('/')}}front-end/css/pages/signin.css" rel="stylesheet" type="text/css">

    </head>

    <body>

        <div class="navbar navbar-fixed-top">

            <div class="navbar-inner">

                <div class="container">

                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>

                    <a class="brand" href="index.html">
                        Bootstrap Admin Template				
                    </a>		

                    <div class="nav-collapse">
                        <ul class="nav pull-right">

                            <li class="">						
                                <a href="signup.html" class="">
                                    Don't have an account?
                                </a>

                            </li>

                            <li class="">						
                                <a href="index.html" class="">
                                    <i class="icon-chevron-left"></i>
                                    Back to Homepage
                                </a>

                            </li>
                        </ul>

                    </div><!--/.nav-collapse -->	

                </div> <!-- /container -->

            </div> <!-- /navbar-inner -->

        </div> <!-- /navbar -->



        <div class="account-container">

            <div class="content clearfix">



                {!! Form::open(['url' => '/login','method'=>'POST']) !!}

                <h1>Member Login</h1>		

                <div class="login-fields">

                    <p>Please provide your details</p>

                    <div class="field" >
                        @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif					<label for="Email">{{ __('E-Mail Address') }}{{ $errors->has('email') ? ' is-invalid' : '' }}</label>
                        {{Form::email('email',null,['class'=>'login username-field','id'=>'email','placeholder'=>'Email'])}}



                    </div> <!-- /field -->

                    <div class="field">

                        @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif  
                        <label for="password">{{ __('Password') }}</label>
                        {{Form::password('password',['class'=>'login password-field','id'=>'password','placeholder'=>'password'])}}




                    </div> <!-- /password -->

                </div> <!-- /login-fields -->

                <div class="login-actions">

                    {{Form::submit('Login',['class'=>'button btn btn-success btn-large','id'=>'submit',$errors->has('password') ? ' is-invalid' : '']) }}


                </div> <!-- .actions -->

                {!! Form::close() !!}

            </div> <!-- /content -->

        </div> <!-- /account-container -->



        <div class="login-extra">
            <a href="#">Reset Password</a>
        </div> <!-- /login-extra -->


        <script src="{{asset('/')}}js/jquery-1.7.2.min.js"></script>
        <script src="{{asset('/')}}js/bootstrap.js"></script>

        <script src="{{asset('/')}}js/signin.js"></script>

    </body>

</html>
