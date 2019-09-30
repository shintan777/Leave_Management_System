@extends('admin.layout.master')

@section('content')

    <div class="page-wrapper">

        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 d-flex no-block align-items-center">
                        @if($month=='7' || $month=='8' || $month=='9'  || $month=='10'  || $month=='11'  || $month=='12' )
                        <h3 class="page-title">Academic Year {{$year}} - {{$year+1}}  Odd Sem </h3>
                        @else
                        <h3 class="page-title">Academic Year {{$year-1}} - {{$year}}  Even Sem </h3>

                        @endif
                       
                
                   
                    <div class="ml-auto text-right">
                        {{-- <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                            </ol>
                        </nav> --}}
                    </div>
                </div>
            </div>
           
        </div>

        <div class="container-fluid">
            @can('isAdmin')
            
            <h4 > </h4><br>
            <div class="row">
                <!-- Column -->
                <div class="col-md-6 col-lg-4 col-xlg-3">
                    <div class="card card-hover">
                        <div class="box bg-success text-center"><a href ="{{route('user')}}">
                            <h1 class="font-light text-white"><i class="mdi mdi-chart-areaspline"></i></h1>
                            <h5 class="m-b-0 m-t-5 text-white">{{ $users->total() }}</h5>
                            <h6 class="text-white">Total employees</h6>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <div class="col-md-6 col-lg-2 col-xlg-3" >
                    <div class="card card-hover">
                        <div class="box bg-warning text-center "><a href ="{{route('leave')}}">
                            <h1 class="font-light text-white"><i class="mdi mdi-collage" ></i></h1>
                            <h5 class="m-b-0 m-t-5 text-white">{{ $leaves->total() }}</h5>
                            <h6 class="text-white">Total leaves</h6>
                        </div>
                    </div>
                </div>
               

                
            </div>
           
            @endcan
            @if($usr->role=='employee' || $usr->role=='hod' || $usr->role=='vp')
            
            <h4 >Balance Leaves</h4><br>
            <div class="row">
                <!-- Column -->
                <div class="col-md-6 col-lg-2 col-xlg-3">
                    <div class="card card-hover">
                        <div class="box bg-success text-center">
                            <h1 class="font-light text-white"><i class="mdi mdi-hospital-building"></i></h1>
                            <h5 class="m-b-0 m-t-5 text-white">{{ $usr->sl }}</h5>
                            
                        </div>
                        <h5 class="text-black"><center>Sick leaves</h5>
                    </div>
                </div>
                <!-- Column -->
                <div class="col-md-6 col-lg-2 col-xlg-3">
                    <div class="card card-hover">
                        <div class="box bg-warning text-center">
                            <h1 class="font-light text-white"><i class="mdi mdi-movie"></i></h1>
                            <h5 class="m-b-0 m-t-5 text-white">{{ $usr->cl }}</h5>
                        </div>
                        <h5 class="text-black"><center>Casual leaves</h5>

                    </div>
                </div>
                <!-- Column -->
                <div class="col-md-6 col-lg-2 col-xlg-3">
                    <div class="card card-hover">
                        <div class="box bg-danger text-center">
                            <h1 class="font-light text-white"><i class="mdi mdi-airplane"></i></h1>
                            <h5 class="m-b-0 m-t-5 text-white">{{ $usr->vac }}</h5>
                        </div>
                        <h5 class="text-black"><center>Vacation</h5>

                    </div>
                </div>
                <!-- Column -->
                <div class="col-md-6 col-lg-2 col-xlg-3">
                    <div class="card card-hover">
                        <div class="box bg-primary text-center">
                            <h1 class="font-light text-white"><i class="mdi mdi-minus-network"></i></h1>
                            <h5 class="m-b-0 m-t-5 text-white">{{ $usr->od }}</h5>
                        </div>
                        <h5 class="text-black"><center>OD</h5>

                    </div>
                </div>
                <!-- Column -->
                <div class="col-md-6 col-lg-2 col-xlg-3">
                    <div class="card card-hover">
                        <div class="box bg-info text-center">
                            <h1 class="font-light text-white"><i class="mdi mdi-timelapse"></i></h1>
                            <h5 class="m-b-0 m-t-5 text-white">{{ $usr->early }}</h5>
                        </div>
                        <h6 class="text-black"><center>Early going/Late coming</h6>

                    </div>
                </div>

                
            </div>
            
            
            @endif

        </div>
    </div>

@endsection

@section('js')

    <script src="{{asset('admin-panel/assets/libs/flot/excanvas.js')}}"></script>
    <script src="{{asset('admin-panel/assets/libs/flot/jquery.flot.js')}}"></script>
    <script src="{{asset('admin-panel/assets/libs/flot/jquery.flot.pie.js')}}"></script>
    <script src="{{asset('admin-panel/assets/libs/flot/jquery.flot.time.js')}}"></script>
    <script src="{{asset('admin-panel/assets/libs/flot/jquery.flot.stack.js')}}"></script>
    <script src="{{asset('admin-panel/assets/libs/flot/jquery.flot.crosshair.js')}}"></script>
    <script src="{{asset('admin-panel/assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js')}}"></script>
    <script src="{{asset('admin-panel/dist/js/pages/chart/chart-page-init.js')}}"></script>

    <script src="{{asset('admin-panel/assets/libs/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('admin-panel/dist/js/jquery-ui.min.js')}}"></script>
    <script src="{{asset('admin-panel/assets/libs/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admin-panel/dist/js/custom.min.js')}}"></script>
    <script src="{{asset('admin-panel/assets/libs/moment/min/moment.min.js')}}"></script>
    <script src="{{asset('admin-panel/assets/libs/fullcalendar/dist/fullcalendar.min.js')}}"></script>
    <script src="{{asset('admin-panel/dist/js/pages/calendar/cal-init.js')}}"></script>

    @endsection
