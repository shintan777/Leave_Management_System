{{-- <!DOCTYPE html>
<html lang="en">
<head>
        <link rel="icon" type="image/png" sizes="16x16" href="{{asset('admin-panel/assets/images/favicon.png')}}">
  <title>Register</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="{{asset('admin-panel/dist/css/style.min.css')}}" rel="stylesheet">
  <style>
        div.transbox {
          background-color: #ffffff;
          opacity: 0.8;
          filter: alpha(opacity=60); /* For IE8 and earlier */
        }
        .menu
        {
          background-color:rgba(0, 0, 0, 0);
        }

        .menu a{
          color: #fff;
          background:transparent;
        }
        body {
                background-image: url("http://ves.ac.in/vesit/wp-content/uploads/sites/3/2015/11/12.jpg");
                background-attachment: fixed;
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
        }
        .navbar-fixed-top {
            min-height: 70px;
            max-height: 120px;
        }

        .navbar-nav > li > a {
            padding-top: 0px;
            padding-bottom: 0px;
            line-height: 80px;
        }

        @media (max-width: 767px) {
            .navbar-nav > li > a {
            line-height: 20px;
            padding-top: 10px;
            padding-bottom: 10px;}
        }
        
      </style>
  
</head>
<body>


<nav class="navbar navbar-expand-lg menu navbar-light navbar-fixed-top navbar-nav bg-transperant static-top navbar-opaque">
        <div class="container">
          <a class="navbar-brand" href="#">
                <img src="https://ves.ac.in/vesit/wp-content/uploads/sites/3/2018/07/Logo.png" alt="VESIT">
              </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                            <a class="nav-link" href="/"><b>Home</b></a>
                        </li>
                     <li class="nav-item">
                       <a class="nav-link" href="/about"><b>About</b></a>
                     </li>
                     <li class="nav-item">
                       <a class="nav-link" href="/login"><b>Login</b></a>
                     </li>
              
            </ul>
          </div>
        </div>
      </nav>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card transbox">
                <div class="card-header">{{ __('Register') }}</div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Employee ID') }}</label>

                            <div class="col-md-6">
                                <input id="username" type="text" pattern ="[0-9]{5}"class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>

                                @if ($errors->has('username'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>

                            <div class="col-md-6">
                                <input id="image" type="file" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" name="image" value="{{ old('image') }}" required autofocus>

                                @if ($errors->has('image'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('First name') }}</label>

                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ old('first_name') }}" required autofocus>

                                @if ($errors->has('first_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Last name') }}</label>

                            <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name') }}" required autofocus>

                                @if ($errors->has('last_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


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

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone number') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" pattern="[0-9]{10}"class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" required autofocus>

                                @if ($errors->has('phone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ old('address') }}" required autofocus>

                                @if ($errors->has('address'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="native" class="col-md-4 col-form-label text-md-right">{{ __(' Native Address') }}</label>

                            <div class="col-md-6">
                                <input id="native" type="text" class="form-control{{ $errors->has('native') ? ' is-invalid' : '' }}" name="native" value="{{ old('native') }}" required autofocus>

                                @if ($errors->has('native'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('native') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>

                            <div class="col-md-6">
                                <select id="gender" type="text" class="form-control{{ $errors->has('gender') ? ' is-invalid' : '' }}" name="gender" value="{{ old('gender') }}" required autofocus>
                                   <option value="male">Male</option>
                                   <option value="female">Female</option>
                                   <option value="other">Other</option>
                                </select>
                                @if ($errors->has('gender'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="dob" class="col-md-4 col-form-label text-md-right">{{ __('Date of birth') }}</label>

                            <div class="col-md-6">
                                <input id="dob" type="date" class="form-control{{ $errors->has('dob') ? ' is-invalid' : '' }}" name="dob" value="{{ old('dob') }}" required autofocus>

                                @if ($errors->has('dob'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('dob') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="join_date" class="col-md-4 col-form-label text-md-right">{{ __('Join date') }}</label>

                            <div class="col-md-6">
                                <input id="join_date" type="date" class="form-control{{ $errors->has('join_date') ? ' is-invalid' : '' }}" name="join_date" value="{{ old('join_date') }}" required autofocus>

                                @if ($errors->has('join_date'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('join_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="job_type" class="col-md-4 col-form-label text-md-right">{{ __('Designation') }}</label>

                            <div class="col-md-6">
                                <select id="job_type" type="text" class="form-control{{ $errors->has('job_type') ? ' is-invalid' : '' }}" name="job_type" value="{{ old('job_type') }}" required autofocus>
                                    <option value="associateProfessor">Associate Professor</option>
                                    <option value="assistantProfessor">Assistant Professor</option>
                                    <option value="non_teaching">Non Teaching</option>
                                    <option value="hod">HOD</option>
                                    <option value="library">Librarian</option>
                                    <option value="vp">VP</option>
                                    <option value="exam">Exam Dept</option>
                                    
                                </select>
                                @if ($errors->has('job_type'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('job_type') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="department" class="col-md-4 col-form-label text-md-right">{{ __('Department') }}</label>

                            <div class="col-md-6">
                                <select id="department" type="text" class="form-control{{ $errors->has('department') ? ' is-invalid' : '' }}" name="department" value="{{ old('department') }}" required autofocus>
                                    <option value="cmpn">CMPN</option>
                                    <option value="inft">INFT</option>
                                    <option value="extc">EXTC</option>
                                    <option value="etrx">ETRX</option>
                                    <option value="inst">INST</option>
                                    <option value="has">HUMANITIES AND SCIENCES</option>
                                    <option value="adm">ADMINISTRATIOM</option>
                                    

                                </select>
                                @if ($errors->has('department'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('department') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" min="8" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" style="width: 170px; padding: 10px; cursor: pointer; font-weight: bold; color: white; background: #0097FF; border-radius: 25px; border: 1px solid #999; font-size: 100%;">
                                    {{ __('Register') }}
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
             div.transbox {
                 margin: 10px;
          background-color: #ffffff;
          background: rgba(0,0,0,.5);
          border-radius: 25px;

 /* For IE8 and earlier */
        }
            body {
              margin: 0;
              font-family: 'Montserrat', sans-serif;
              font-size:17px;
              
                color: white;
              display: inline-block;
              /* background:url('https://schoolbook.getmyuni.com/assets/images/rev_img/5212__1970/14290069515.jpg') no-repeat center 130px;
              background-size:cover;
                 */
                 position: relative;
                 font-weight: normal !important;
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
                bottom:0;
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
    
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card transbox">
                            {{-- <div class="card-header">{{ __('Register') }}</div> --}}
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
            
                            <div class="card-body">
                                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                                    @csrf
            
                                    <div class="form-group row">
                                        <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Employee ID') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="username" type="text" pattern ="[0-9]{5}"class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>
            
                                            @if ($errors->has('username'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('username') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
            
                                    <div class="form-group row">
                                        <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="image" type="file" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" name="image" value="{{ old('image') }}" required autofocus>
            
                                            @if ($errors->has('image'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('image') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
            
            
            
                                    <div class="form-group row">
                                        <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('First name') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="first_name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ old('first_name') }}" required autofocus>
            
                                            @if ($errors->has('first_name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('first_name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
            
                                    <div class="form-group row">
                                        <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Last name') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name') }}" required autofocus>
            
                                            @if ($errors->has('last_name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('last_name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
            
            
                                    <div class="form-group row">
                                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="email" pattern="*+ves\.ac\.in$" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
            
                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    
            
                                    <div class="form-group row">
                                        <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone number') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="phone" type="text" pattern="[0-9]{10}"class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" required autofocus>
            
                                            @if ($errors->has('phone'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('phone') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
            
                                    <div class="form-group row">
                                        <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ old('address') }}" required autofocus>
            
                                            @if ($errors->has('address'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('address') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
            
                                    <div class="form-group row">
                                        <label for="native" class="col-md-4 col-form-label text-md-right">{{ __(' Native Address') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="native" type="text" class="form-control{{ $errors->has('native') ? ' is-invalid' : '' }}" name="native" value="{{ old('native') }}" required autofocus>
            
                                            @if ($errors->has('native'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('native') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
            
                                    <div class="form-group row">
                                        <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>
            
                                        <div class="col-md-6">
                                            <select id="gender" type="text" class="form-control{{ $errors->has('gender') ? ' is-invalid' : '' }}" name="gender" value="{{ old('gender') }}" required autofocus>
                                               <option value="male">Male</option>
                                               <option value="female">Female</option>
                                               <option value="other">Other</option>
                                            </select>
                                            @if ($errors->has('gender'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('gender') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
            
            
                                    <div class="form-group row">
                                        <label for="dob" class="col-md-4 col-form-label text-md-right">{{ __('Date of birth') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="dob" type="date" class="form-control{{ $errors->has('dob') ? ' is-invalid' : '' }}" name="dob" value="{{ old('dob') }}" required autofocus>
            
                                            @if ($errors->has('dob'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('dob') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
            
                                    <div class="form-group row">
                                        <label for="join_date" class="col-md-4 col-form-label text-md-right">{{ __('Join date') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="join_date" type="date" class="form-control{{ $errors->has('join_date') ? ' is-invalid' : '' }}" name="join_date" value="{{ old('join_date') }}" required autofocus>
            
                                            @if ($errors->has('join_date'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('join_date') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
            
                                    <div class="form-group row">
                                        <label for="job_type" class="col-md-4 col-form-label text-md-right">{{ __('Designation') }}</label>
            
                                        <div class="col-md-6">
                                            <select id="job_type" type="text" class="form-control{{ $errors->has('job_type') ? ' is-invalid' : '' }}" name="job_type" value="{{ old('job_type') }}" required autofocus>
                                                <option value="associateProfessor">Associate Professor</option>
                                                <option value="assistantProfessor">Assistant Professor</option>
                                                <option value="non_teaching">Non Teaching</option>
                                                <option value="hod">HOD</option>
                                                <option value="library">Librarian</option>
                                                <option value="vp">VP</option>
                                                <option value="exam">Exam Dept</option>
                                                
                                            </select>
                                            @if ($errors->has('job_type'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('job_type') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="department" class="col-md-4 col-form-label text-md-right">{{ __('Department') }}</label>
            
                                        <div class="col-md-6">
                                            <select id="department" type="text" class="form-control{{ $errors->has('department') ? ' is-invalid' : '' }}" name="department" value="{{ old('department') }}" required autofocus>
                                                <option value="cmpn">CMPN</option>
                                                <option value="inft">INFT</option>
                                                <option value="extc">EXTC</option>
                                                <option value="etrx">ETRX</option>
                                                <option value="inst">INST</option>
                                                <option value="has">HUMANITIES AND SCIENCES</option>
                                                <option value="adm">ADMINISTRATIOM</option>
                                                
            
                                            </select>
                                            @if ($errors->has('department'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('department') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
            
                                    <div class="form-group row">
                                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="password" type="password" min="8" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
            
                                            @if ($errors->has('password'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
            
                                    <div class="form-group row">
                                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                        </div>
                                    </div>
            
                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary" style="width: 170px; padding: 10px; cursor: pointer; font-weight: bold; color: white; background: #0097FF; border-radius: 25px; border: 1px solid #999; font-size: 100%;">
                                                {{ __('Register') }}
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
<footer id="footer" style="font-size:15px; ">
        <div align="center"> <a href="/" style="color: rgb(0, 0, 255)">HOME  </a><a href="/about"style="color:#0006ff">&#9679;   ABOUT </a><p align="center"style="color:#0006ff; ">Copyright © All rights Reserved.</p></div>
         
       </footer>
</html>
