{{-- <!DOCTYPE html>
<html dir="ltr">

<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('admin-panel/assets/images/favicon.png')}}">
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
<div class="main-wrapper">
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div class="auth-wrapper d-flex no-block justify-content-center align-items-center bg-transperant">
        <div class="auth-box bg-transparent border-secondary">
            <div id="loginform">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                    <div class="row p-b-30">
                        <div class="col-12">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-success text-white" id="basic-addon1"><i class="ti-user"></i></span>
                                </div>
                                <input type="email" name="email" class="form-control form-control-lg{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email" aria-label="Username" aria-describedby="basic-addon1" required="">
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color:white">{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-warning text-white" id="basic-addon2"><i class="ti-pencil"></i></span>
                                </div>
                                <input type="password" name="password" class="form-control form-control-lg{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" required="">
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert" >
                                        <strong style="color: white">{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row border-secondary">
                        <div class="col-12">
                            <div class="form-group">
                                <div class="p-t-20">
                                        @if (Route::has('password.request'))
                                        <a class="btn btn-info" style="border-radius:20px"href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                    <button class="btn btn-success float-right" style="border-radius:20px" type="submit">Login</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
           
            <div id="recoverform">
                <div class="text-center">
                    <span class="text-white">Enter your e-mail address below and we will send you instructions how to recover a password.</span>
                </div>
                <div class="row m-t-20">
                    <!-- Form -->
                    <form class="col-12" action="index.html">
                        <!-- email -->
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-danger text-white" id="basic-addon1"><i class="ti-email"></i></span>
                            </div>
                            <input type="text" class="form-control form-control-lg" placeholder="Email Address" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        <!-- pwd -->
                        <div class="row m-t-20 p-t-20 border-top border-secondary">
                            <div class="col-12">
                                <a class="btn btn-success" href="#" id="to-login" name="action">Back To Login</a>
                                <button class="btn btn-info float-right" type="button" name="action">Recover</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('admin-panel/assets/libs/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="{{asset('admin-panel/assets/libs/popper.js/dist/umd/popper.min.js')}}"></script>
<script src="{{asset('admin-panel/assets/libs/bootstrap/dist/js/bootstrap.min.js')}}"></script>

<script>

    $('[data-toggle="tooltip"]').tooltip();
    $(".preloader").fadeOut();

    $('#to-recover').on("click", function() {
        $("#loginform").slideUp();
        $("#recoverform").fadeIn();
    });
    $('#to-login').click(function(){

        $("#recoverform").hide();
        $("#loginform").fadeIn();
    });
</script>

</body>

</html> --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('admin-panel/assets/images/favicon.png')}}">
  <title>VESIT</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  {{-- <link rel="stylesheet" href="{{asset('css/app.css')}}"> --}}
  {{-- <link href="{{asset('css/app.css')}}" rel="stylesheet"> --}}
  <link href="{{asset('admin-panel/dist/css/style.min.css')}}" rel="stylesheet">
  {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> --}}
  <style>
            body {
              margin: 0;
              font-family: 'Montserrat', sans-serif;
              color : black;
              font-size:17px;
              display: inline-block;
              /* background:url('https://schoolbook.getmyuni.com/assets/images/rev_img/5212__1970/14290069515.jpg') no-repeat center 130px;
              background-size:cover;
                 */
                 position: relative;
            }
            header {
              box-shadow: 0 4px 6px rgba(0,0,0,.2); 

            }
            .container {
              padding: 20px;
              max-width: 1700px;
              margin: 0 auto;
              background-color: #ffc107 /* old color #f5ac23*/;
              min-height:90px;
              max-height:90px;
              color: black;
              
            }
            .logo-box {
              float: left;
              margin-right: 16px;
            }
            .logo-box a {
              outline: none;
              display: block;
            }
            .logo-box img {display: block;}
            nav {
              overflow: hidden;
            }
            ul {
              list-style: none;
              margin: 0;
              padding: 0;
              float: right;
            }
            nav li {
              display: inline-block;
              margin-left: 25px;
              height: 70px;
              line-height: 70px;
              transition: .5s linear;
            }
            nav a {
              text-decoration: none;
              display: block;
              position: relative;
              color: #868686;
              text-transform: uppercase;
            }
            nav a:after {
              content: "";
              width: 0;
              height: 2px;
              position: absolute;
              left: 0;
              bottom: 2px;
              background: #0000b8;
              transition: width .5s linear;  
            }
            nav a:hover:after {width: 100%;}

            @media screen and (max-width: 660px) {
              header {text-align: center;}
              .logo-box {
                float: none;
                display: inline-block;
                margin: 0 0 16px 0;
                
              }
              ul {float: none;}
              nav li:first-of-type {margin-left: 0;}
            }
            @media screen and (max-width: 550px) {
            /* nav {overflow: visible;} */
            nav li {
              display:block;
              margin: 0;
              height: 40px;
              line-height: 40px;
            }
            nav li:hover {background: rgba(0,0,0,.1);}
            nav a:after {content: none;}
            }
            
            #footer {
                
                height: 9.1%;
                margin-top: -5px;
                background-color:#f5ac23;
            }
            .bottom-right {
              position: absolute;
              bottom: 8px;
              right: 16px;
            }
            #loginform{
                padding: 20px;
                background: rgba(0,0,0,.5);
            }
            #totalPage{
                max-height: 30px;
                
            }
            .navbar-nav > li > a {
                
              padding-top: 0px;
              padding-bottom: 0px;
              line-height: 70px;
              text-align : center;
              
          }
          /* @import url(https://fonts.googleapis.com/css?family=Open+Sans); */
/* .btn { display: inline-block; *display: inline; *zoom: 1; padding: 4px 10px 4px; margin-bottom: 0; font-size: 13px; line-height: 18px; color: #333333; text-align: center;text-shadow: 0 1px 1px rgba(255, 255, 255, 0.75); vertical-align: middle; background-color: #f5f5f5; background-image: -moz-linear-gradient(top, #ffffff, #e6e6e6); background-image: -ms-linear-gradient(top, #ffffff, #e6e6e6); background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#ffffff), to(#e6e6e6)); background-image: -webkit-linear-gradient(top, #ffffff, #e6e6e6); background-image: -o-linear-gradient(top, #ffffff, #e6e6e6); background-image: linear-gradient(top, #ffffff, #e6e6e6); background-repeat: repeat-x; filter: progid:dximagetransform.microsoft.gradient(startColorstr=#ffffff, endColorstr=#e6e6e6, GradientType=0); border-color: #e6e6e6 #e6e6e6 #e6e6e6; border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25); border: 1px solid #e6e6e6; -webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px; -webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05); -moz-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05); box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05); cursor: pointer; *margin-left: .3em; }
.btn:hover, .btn:active, .btn.active, .btn.disabled, .btn[disabled] { background-color: #e6e6e6; }
.btn-large { padding: 9px 14px; font-size: 15px; line-height: normal; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; }
.btn:hover { color: #333333; text-decoration: none; background-color: #e6e6e6; background-position: 0 -15px; -webkit-transition: background-position 0.1s linear; -moz-transition: background-position 0.1s linear; -ms-transition: background-position 0.1s linear; -o-transition: background-position 0.1s linear; transition: background-position 0.1s linear; }
.btn-primary, .btn-primary:hover { text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25); color: #ffffff; }
.btn-primary.active { color: rgba(255, 255, 255, 0.75); }
.btn-primary { background-color: #4a77d4; background-image: -moz-linear-gradient(top, #6eb6de, #4a77d4); background-image: -ms-linear-gradient(top, #6eb6de, #4a77d4); background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#6eb6de), to(#4a77d4)); background-image: -webkit-linear-gradient(top, #6eb6de, #4a77d4); background-image: -o-linear-gradient(top, #6eb6de, #4a77d4); background-image: linear-gradient(top, #6eb6de, #4a77d4); background-repeat: repeat-x; filter: progid:dximagetransform.microsoft.gradient(startColorstr=#6eb6de, endColorstr=#4a77d4, GradientType=0);  border: 1px solid #3762bc; text-shadow: 1px 1px 1px rgba(0,0,0,0.4); box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.5); }
.btn-primary:hover, .btn-primary:active, .btn-primary.active, .btn-primary.disabled, .btn-primary[disabled] { filter: none; background-color: #4a77d4; }
.btn-block { width: 100%; display:block; } */

* { -webkit-box-sizing:border-box; -moz-box-sizing:border-box; -ms-box-sizing:border-box; -o-box-sizing:border-box; box-sizing:border-box; }

html { width: 100%; height:100%; overflow:hidden; }

body { 
    width: 100%;
    height:100%;
    font-family: 'Open Sans', sans-serif;
    /* background: #092756;
    background: -moz-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%),-moz-linear-gradient(top,  rgba(57,173,219,.25) 0%, rgba(42,60,87,.4) 100%), -moz-linear-gradient(-45deg,  #670d10 0%, #092756 100%);
    background: -webkit-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%), -webkit-linear-gradient(top,  rgba(57,173,219,.25) 0%,rgba(42,60,87,.4) 100%), -webkit-linear-gradient(-45deg,  #670d10 0%,#092756 100%);
    background: -o-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%), -o-linear-gradient(top,  rgba(57,173,219,.25) 0%,rgba(42,60,87,.4) 100%), -o-linear-gradient(-45deg,  #670d10 0%,#092756 100%);
    background: -ms-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%), -ms-linear-gradient(top,  rgba(57,173,219,.25) 0%,rgba(42,60,87,.4) 100%), -ms-linear-gradient(-45deg,  #670d10 0%,#092756 100%);
    background: -webkit-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%), linear-gradient(to bottom,  rgba(57,173,219,.25) 0%,rgba(42,60,87,.4) 100%), linear-gradient(135deg,  #670d10 0%,#092756 100%);
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#3E1D6D', endColorstr='#092756',GradientType=1 ); */
    background-image: url('https://images.static-collegedunia.com/public/college_data/images/appImage/15528_VESIT.jpg');
    background-repeat: no-repeat;
    background-size: cover;
    /*overflow: hidden;*/
}
.login { 
    position: absolute;
    top: 50%;
    left: 50%;
    margin: -150px 0 0 -150px;
    width:300px;
    height:300px;
}
.login h1 { color: #fff; text-shadow: 0 0 10px rgba(0,0,0,0.3); letter-spacing:1px; text-align:center; }

input { 
    width: 100%; 
    margin-bottom: 10px; 
    background: rgba(0,0,0,0.3);
    border: none;
    outline: none;
    padding: 10px;
    font-size: 13px;
    color: #fff;
    text-shadow: 1px 1px 1px rgba(0,0,0,0.3);
    border: 1px solid rgba(0,0,0,0.3);
    border-radius: 4px;
    box-shadow: inset 0 -5px 45px rgba(100,100,100,0.2), 0 1px 1px rgba(255,255,255,0.2);
    -webkit-transition: box-shadow .5s ease;
    -moz-transition: box-shadow .5s ease;
    -o-transition: box-shadow .5s ease;
    -ms-transition: box-shadow .5s ease;
    transition: box-shadow .5s ease;
}
input:focus { box-shadow: inset 0 -5px 45px rgba(100,100,100,0.4), 0 1px 1px rgba(255,255,255,0.2); }
            @import url(https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400);
/* body{
  font-family: 'Source Sans Pro', sans-serif;
  font-weight:300;
  
  color:blue;
} */
section{
  text-align:center;
}

      </style>
  
</head>
<body>

<header id="header">
  {{-- <div class="container">
    <div class="logo-box">
      <a href="/">
        <img src="admin-panel\assets\images\favicon.png" alt="" align="left">
      </a>
    </div>
    <div style =" color:Blue;font-size:35px;font-family :'Times New Roman', serif;text-align:center; " >VESIT LMS</div>
    <nav>
    <ul class="float-right" style="text-align:center; margin-top:-30px;">
      <li><a href="/">home</a></li>
      <li><a href="/login">login</a></li>
      <li><a href="/register">Register</a></li>

   </ul>
  </nav>
  </div> --}}
  
  <nav class="navbar navbar-expand-md navbar-light bg-warning shadow-sm ">
        <div class="container">
                <img src="https://ves.ac.in/vesit/wp-content/uploads/sites/3/2018/07/Logo.png"  width="48"  height="70"  alt="Institute of Technology Logo"  data-scale="1"  /> 
                        <a href="/"><div  class="navbar-brand"  title="Institute of Technology">
                         <p style="margin-left: 10px"><font color="blue" size="5%">VIVEKANAND EDUCATION SOCIETY'S</font></p>
                         <em style="margin-left: 10px"><font color="blue">Institute of Technology</font></em>
                        </div></a>
                        
                    

            {{-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button> --}}

            <div class="collapse navbar-collapse" >
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                   
                    <li><a href="/login">login</a></li>
                    <li><a href="/register">Register</a></li>
                </ul>
            </div>
        </div>
    </nav>
  
  
</header>


  

<script src="js/jquery-2.2.3.min.js"></script>
<script src="js/bootstrap.js"></script>
<div class="main-wrapper">
    
    <div id ="totalPage" class="auth-wrapper d-flex no-block justify-content-center align-items-center ">
           
         <!--div class="auth-box bg-transparent border-secondary"--> 
            <div id="loginform" style="margin-top:0px; ">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                    <div class="row p-b-30">
                        <div class="col-12">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-success text-white" id="basic-addon1"><i class="ti-user"></i></span>
                                </div>
                                <input type="email" name="email" class="form-control form-control-lg{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email" aria-label="Username" aria-describedby="basic-addon1" required="">
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color:white">{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-warning text-white" id="basic-addon2"><i class="ti-pencil"></i></span>
                                </div>
                                <input type="password" name="password" class="form-control form-control-lg{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" required="">
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert" >
                                        <strong style="color: white">{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                   
                    <div class="row border-secondary">
                        <div class="col-12">
                            <div class="form-group">
                                <div class="p-t-20">
                                        @if (Route::has('password.request'))
                                        <a class="btn btn-info" style="border-radius:20px"href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                    <button class="btn btn-success float-right" style="border-radius:20px" type="submit">Login</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
           
            <div id="recoverform">
                <div class="text-center">
                    <span class="text-white">Enter your e-mail address below and we will send you instructions how to recover a password.</span>
                </div>
                <div class="row m-t-20">
                    <!-- Form -->
                    <form class="col-12" action="index.html">
                        <!-- email -->
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-danger text-white" id="basic-addon1"><i class="ti-email"></i></span>
                            </div>
                            <input type="text" class="form-control form-control-lg" placeholder="Email Address" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        <!-- pwd -->
                        <div class="row m-t-20 p-t-20 border-top border-secondary">
                            <div class="col-12">
                                <a class="btn btn-success" href="#" id="to-login" name="action">Back To Login</a>
                                <button class="btn btn-info float-right" type="button" name="action">Recover</button>
                            </div>
                           
                        </div>
                    </form>
                </div>
            </div>
       </div> 
    </div>
<!--/div-->

</body>
<footer id="footer" style="font-size:15px; ">
        <div align="center"> <a href="/" style="color: rgb(0, 0, 255)">HOME  </a><a href="/about"style="color:#0006ff">&#9679;   ABOUT </a><p align="center"style="color:#0006ff; ">Copyright © All rights Reserved.</p></div>
         
       </footer>
</html>
