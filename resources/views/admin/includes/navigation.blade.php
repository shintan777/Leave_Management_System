
<header class="topbar" data-navbarbg="skin5">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <div class="navbar-header bg-warning" data-logobg="skin5">
            <!-- This is for the sidebar toggle which is visible on mobile only -->
            <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>

            <a class="navbar-brand" href="{{route('dashboard')}}">
                <b class="logo-icon p-l-10">
                    <img src="\logo-icon.png" alt="homepage" class="light-logo" />
                </b>
                <span class="logo-text">
                          

                        </span>
            </a>
            <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
        
        </div>
        <div class="navbar-collapse bg-warning collapse" id="navbarSupportedContent" data-navbarbg="skin5">
            <ul class="navbar-nav mr-auto float-left " >
                {{-- <li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" id="sidebarCollpase" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li> --}}
               
            </ul>
            
            <ul class="navbar-nav float-left">
                
                {{--<li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="font-24 mdi mdi-comment-processing"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right mailbox animated bounceInDown" aria-labelledby="2">
                        <ul class="list-style-none">
                            <li>
                                <div class="">
                                    <!-- Message -->
                                    <a href="javascript:void(0)" class="link border-top">
                                        <div class="d-flex no-block align-items-center p-10">
                                            <span class="btn btn-success btn-circle"><i class="ti-calendar"></i></span>
                                            <div class="m-l-10">
                                                <h5 class="m-b-0">Event today</h5>
                                                <span class="mail-desc">test</span>
                                            </div>
                                        </div>
                                    </a>
                                    <!-- Message -->
                                    <a href="javascript:void(0)" class="link border-top">
                                        <div class="d-flex no-block align-items-center p-10">
                                            <span class="btn btn-primary btn-circle"><i class="ti-user"></i></span>
                                            <div class="m-l-10">
                                                <h5 class="m-b-0">abcd</h5>
                                                <span class="mail-desc">Just see the my admin!</span>
                                            </div>
                                        </div>
                                    </a>
                                    <!-- Message -->
                                    <a href="javascript:void(0)" class="link border-top">
                                        <div class="d-flex no-block align-items-center p-10">
                                            <span class="btn btn-danger btn-circle"><i class="fa fa-link"></i></span>
                                            <div class="m-l-10">
                                                <h5 class="m-b-0">Launch Admin</h5>
                                                <span class="mail-desc">Just see the my new admin!</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>--}}
                </li>
                <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <h5></h5>
                            <h5 style="color:white ; margin-top:0px">{{ Auth::user()->first_name }} ({{ Auth::user()->department}})<br>EMP ID:{{ Auth::user()->username}}&nbsp;<i class="down" id="downarrow"></i></h5>
                            <style>
                                #downarrow{
                                    border: solid white;
                                    border-width: 0 3px 3px 0;
                                   
                                    display: inline-block;
                                    padding: 3px;
                                }
                                .down{
                                    transform: rotate(45deg);
                                    -webkit-transform: rotate(45deg);
                                }
                            </style>
                            <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right user-dd animated">
                                <a class="dropdown-item" href="{{route('profile')}}"><i class="ti-user m-r-5 m-l-5"></i> My Profile</a>
        
        
                                <a href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="dropdown-item">
                                    <i class="fa fa-power-off m-r-5 m-l-5"></i>
                                    Logout
                                </a>
                                <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">
                                    @csrf
                                </form>
        
                               
                            </div>
                    </li>
                {{-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="/" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{asset('admin-panel/assets/images/users/1.jpg')}}" alt="user" class="rounded-circle" width="31"></a>
                    <div class="dropdown-menu dropdown-menu-right user-dd animated">
                        <a class="dropdown-item" href="{{route('profile')}}"><i class="ti-user m-r-5 m-l-5"></i> My Profile</a>


                        <a href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="dropdown-item">
                            <i class="fa fa-power-off m-r-5 m-l-5"></i>
                            Logout
                        </a>
                        <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">
                            @csrf
                        </form>

                       
                    </div>
                </li> --}}
            </ul>
        </div>
    </nav>
</header>