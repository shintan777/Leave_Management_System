@extends('admin.layout.master')

@section('content')
<style>
#image{
    margin-top: 10px;
    margin-left: 16em;
}</style>
    <div id="main-wrapper">
    @include('admin.includes.sidebar')
        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">My profile</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <input style="width: 100px; padding: 10px; cursor: pointer; font-weight: bold; color: white; background: #0097FF; border-radius: 25px;margin-top:10px; border: 1px solid #999; font-size: 100%;" type="button" value="Edit" onclick="window.location.href='/user/edit/{{$user->id}}'"/>
                                
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-5">
                                <div class="box-body no-padding">

                                        <table class="table">
                                            <tbody>
                                            {{--@foreach($users as $user)--}}
                        
                                                <tr>
                                                    <td style="width: 20px" class="text-center"><i class="fa fa-user"></i>
                                                    </td>
                                                    <td><strong>Username</strong></td>
                                                    <td>{{$user->first_name}}</td>
                                                </tr>
                                                
                                                <tr>
                                                    <td style="width: 10px" class="text-center"><i class="fa fa-birthday-cake"></i>
                                                    </td>
                                                    <td><strong>Birthday</strong></td>
                                                    <td>{{$user->dob}}</td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 10px" class="text-center"><i class="fa fa-genderless"></i>
                                                    </td>
                                                    <td><strong>Gender</strong></td>
                                                    <td>{{$user->gender}}</td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 10px" class="text-center"><i class="fa fa-mobile-alt"></i>
                                                    </td>
                                                    <td><strong>Phone number</strong></td>
                                                    <td>{{$user->phone}}</td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 10px" class="text-center"><i class="	fa fa-envelope"></i>
                                                    </td>
                                                    <td><strong>Email</strong></td>
                                                    <td>{{$user->email}}</td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 10px" class="text-center"><i class="fa fa-calendar"></i>
                                                    </td>
                                                    <td><strong>Join date</strong></td>
                                                    <td>{{$user->join_date}}</td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 10px" class="text-center"><i class="fa fa-map-marker"></i>
                                                    </td>
                                                    <td><strong>Address</strong></td>
                                                    <td>{{$user->address}}</td>
                                                </tr>
                                            {{--@endforeach--}}
                                            </tbody>
                                        </table>
                                        
                                        {{--{{ $users->links() }}--}}
                        
                                    </div>
                        </div>

                        <div class="box box-success">
                            <div class="panel"  >
                                
                                <div class="panel-body pn pb5">
                                  
                                    <div class="box-body no-padding ">
                                    </div>
                                    <img id="image" src="{{ asset('uploads/gallery/' . $user->image) }}" alt="user" align="right"  height="100px" width="100px">

    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

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