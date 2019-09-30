
<!DOCTYPE html>
<html dir="ltr">

<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('admin-panel/assets/images/favicon.png')}}">
    <!-- Custom CSS -->
    {{-- <link rel="stylesheet" href="{{asset('css/app.css')}}"> --}}
    <link href="{{asset('admin-panel/dist/css/style.min.css')}}" rel="stylesheet">

    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        body {
                background-image: url("http://ves.ac.in/vesit/wp-content/uploads/sites/3/2015/11/12.jpg");
                background-attachment: fixed;
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;

        }
        div.transbox{
            background-color: #ffffff;
            opacity:0.8;
            filter:alpha(opacity=60);
        }
        .menu
        {
          background-color:rgba(0, 0, 0, 0.2);
        }

        .menu a{
          color: #fff;
          background:transparent;
        }
        .navbar-fixed-top {
            min-height: 70px;
            max-height: 120px;
        }

        .navbar-nav > li > a {
            padding-top: 0px;
            padding-bottom: 0px;
            line-height: 70px;
            text-align : center;
        }

        @media (max-width: 767px) {
            .navbar-nav > li > a {
            line-height: 20px;
            padding-top: 0px;
            padding-bottom: 0px;}
        }
    </style>
</head>

    


<body >
        <nav class="navbar navbar-expand-lg menu navbar-fixed-top navbar-nav bg-transperant static-top navbar-opaque">
                <div class="container">
                  <a class="navbar-brand" href="#">
                        <img src="https://ves.ac.in/vesit/wp-content/uploads/sites/3/2018/07/Logo.png" alt="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;VESIT LEAVE MANAGEMENT SYSTEM
                      </a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                      </button>
                  <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                             <a class="nav-link" href="/">Home</a>
                         </li>
                      <li class="nav-item">
                        <a class="nav-link" href="/about">About</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="/register">Register</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </nav>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card transbox" style="margin:50px; border-radius:10px">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" style="border-radius:20px; opacity:1">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
