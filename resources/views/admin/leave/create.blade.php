@extends('admin.layout.master')

@section('content')

    @include('admin.includes.sidebar')

    <div class="page-wrapper">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
    @endif

            <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 d-flex no-block align-items-center">
                    <h4 class="page-title">Leave Management</h4>
                    <div class="ml-auto text-right">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><a href="{{route('leave.create')}}">Leave</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10">
                    <div class="card">
                        <form method="POST" action="{{route('leave.store')}}"  class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <h4 class="card-title">Apply Leave</h4>
                                <div class="form-group row">
                                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Leave type</label>
                                    <div class="col-sm-9">
                                            <select id="fname" type="text" class="form-control" name="leave_type">
                                                    <option value="sl">Sick Leave</option>
                                                    <option value="cl">Casual Leave</option>
                                                    <option value="early">Early Going / Late Coming</option>
                                                    <option value="vac">Vacation</option>
                                                    <option value="od">OD</option>
                                                </select>
                                       
                                    </div>
                                </div>
                                <div id="slview" class="autoUpdate" >
                                <div class="form-group row">
                                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">Date from and to</label>
                                    <div class="col-sm-4">
                                        <input type="date"  name="sldate_from" class="form-control" id="slFromDate">
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="date" onchange="calcdate('sl')" name="sldate_to" class="form-control" id="slToDate">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Days</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="sldays" class="form-control" id="slTotalDays" placeholder="Number of leave days">
                                    </div>
                                    
                                </div>
                                <div class="form-group row">
                                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Reason</label>
                                    <div class="col-sm-9">
                                        <textarea type="text" name="slreason" class="form-control" placeholder="Reason"></textarea></div>
                                </div>
                                
                               
                                </div>
                                <div id="vacview" class="autoUpdate" hidden>
                                        <div class="form-group row">
                                            <label for="lname" class="col-sm-3 text-right control-label col-form-label">Date from</label>
                                            <div class="col-sm-4">
                                                <input type="date"  name="vacdate_from" class="form-control" id="vacFromDate">
                                            </div>
                                            <div class="col-sm-4">
                                                <input type="date" onchange="calcdate('vac')" name="vacdate_to" class="form-control" id="vacToDate">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Days</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="vacdays" class="form-control" id="vacTotalDays" placeholder="Number of leave days">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Subjects taken in current sem</label>
                                            <div class="col-sm-9">
                                                <textarea type="text" name="vacreason" class="form-control" placeholder="Subject name : Date of paper"></textarea></div>
                                        </div>
                                        </div>
                                        <div id="clview" class="autoUpdate" hidden>
                                                <div class="form-group row">
                                                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">Date from</label>
                                                    <div class="col-sm-4">
                                                        <input type="date"  name="cldate_from" class="form-control" id="clFromDate">
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <input type="date" name="cldate_to" onchange="calcdate('cl')" class="form-control" id="clToDate">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Days</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="cldays" class="form-control" id="clTotalDays" placeholder="Number of leave days">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Reason</label>
                                                    <div class="col-sm-9">
                                                        <textarea type="text" name="clreason" class="form-control" placeholder="Reason"></textarea></div>
                                                </div>
                                                </div>
                                        <div id="earlyview" class="autoUpdate" hidden>
                                                <div class="form-group row">
                                                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">Date and Departure Time</label>
                                                    <div class="col-sm-4">
                                                        <input type="datetime-local"  name="earlydate_from" class="form-control" id="earlyFromDate">
                                                    </div>
                                                    <div class="col-sm-4">
                                                            <input type="hidden" name="earlydate_to" class="form-control" id="earlyToDate"  >

                                                            <input type="hidden"  name="earlydays" class="form-control" id="earlyTotalDays" value="1">
                                                    </div>
                                                </div>
                                                    
                                                
                                               
                                                <div class="form-group row">
                                                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Reason</label>
                                                    <div class="col-sm-9">
                                                        <textarea type="text" name="earlyreason" class="form-control" placeholder="Reason"></textarea></div>
                                                </div>
                                                </div>
                                                <div id="odview" class="autoUpdate" hidden>
                                                    <div class="form-group row">
                                                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Date from</label>
                                                        <div class="col-sm-4">
                                                            <input type="date"  name="oddate_from" class="form-control" id="odFromDate">
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <input type="date" name="oddate_to" onchange="calcdate('od')" class="form-control" id="odToDate">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Days</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="oddays" class="form-control" id="odTotalDays" placeholder="Number of leave days">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Purpose of Visit</label>
                                                        <div class="col-sm-9">
                                                            <textarea type="text" name="odreason" class="form-control" placeholder="Purpose"></textarea></div>
                                                    </div>
                                                        </div>
                               
                            
                                <center>
                                    <label>Document/Image</label>
                                        <input id="image" type="file"  name="image"  autofocus>
                                    </center><br><br>
                                <center><button type="submit" class="btn btn-dark">Apply</button><center>
                            
                            
                            
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
        

    </div>

@endsection

@section('js')
    <script>
         function calcdate(lt){
             
            var fromdate= document.getElementById(lt+"FromDate");
            var todate= document.getElementById(lt+"ToDate");
            var start =new Date(fromdate.value); 
            var end = new Date(todate.value);
            var diff = new Date(end - start);
            var target = document.getElementById(lt+"TotalDays");
            var days=1;
            days = diff / 1000 / 60 / 60 / 24;
            if (lt!='cl' || lt!='vac'){
            var weeks = Math.floor(days / 7);          
            var days = days - weeks ;
            var startDay = start.getDay();
            var endDay = end.getDay();   
            if (startDay - endDay >= 1)   {    
                days = days - 1;}
            if (startDay == 0 && endDay != 7){
                days = days - 1; }
            if (endDay == 7 && startDay != 0){
                 days = days - 1;}}
            if (days<0) {
                target.value = 0;
                alert("Enter valid dates");
            } else {
                target.value = days+1;
            } 
          }
        // $("#ToDate").change(function () {
        //     var start = new Date($('#FromDate').val());
        //     var end = new Date($('#ToDate').val());

        //     var diff = new Date(end - start);
        //     var days=1;
        //     days = diff / 1000 / 60 / 60 / 24;

        //     // $('#TotalDays').val(days);
        //     if (days == NaN) {
        //         $('#TotalDays').val(0);
        //     } else {
        //         $('#TotalDays').val(days+1);
        //     } 
            
        // })

        // $("#FromDate").change(function () {
        //     var start = new Date($('#FromDate').val());
        //     var end = new Date($('#ToDate').val());

        //     var diff = new Date(end - start);
        //     var days=1;
        //     days = diff / 1000 / 60 / 60 / 24;

        //     // $('#TotalDays').val(days);
        //     if (days == NaN) {
        //         $('#TotalDays').val(0);
        //     } else {
        //         $('#TotalDays').val(days+1);
        //     }
        // })
    </script>
  <script>
            $(document).ready(function(){
        $('#fname').change(function(){
            var e = document.getElementById("fname"); 
            if(e.options[e.selectedIndex].text=="OD")
            $('#odview').prop('hidden', false);
            else
            $('#odview').prop('hidden', true);
            if(e.options[e.selectedIndex].value=="sl")
            $('#slview').prop('hidden', false);
            else
            $('#slview').prop('hidden', true);
            if(e.options[e.selectedIndex].value=="cl")
            $('#clview').prop('hidden', false);
            else
            $('#clview').prop('hidden', true);
            if(e.options[e.selectedIndex].value=="early")
            $('#earlyview').prop('hidden', false);
            else
            $('#earlyview').prop('hidden', true);
            if(e.options[e.selectedIndex].value=="vac")
            $('#vacview').prop('hidden', false);
            else
            $('#vacview').prop('hidden', true);
        });
    });
            </script>
            
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