@extends('admin.layout.master')

@section('content')

    <div id="main-wrapper">
    {{-- @include('admin.includes.sidebar') --}}
        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Leave Management</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><a href="{{route('leave')}}">Leave</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <form action="{{route('leave.search')}}" method="GET" class="form-horizontal">
                                <div class="card-body">
                                    <h4 class="card-title">Search</h4>
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Search by Leave Type </label>
                                        <div class="col-sm-9">
                                            <input type="text" name="search" class="form-control" id="fname" placeholder="Leave Type">
                                        </div>
                                    </div>
                                </div>
                                <div class="border-top">
                                    <div class="card-body">
                                        <button type="submit" class="btn btn-success">Search</button>
                                        <a href="{{route('leave')}}" class="btn btn-md btn-danger">Clear</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="row">
                    
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Leave List</h5>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>S.N.</th>
                                            @if(Auth::User()->role=='vp' || Auth::User()->role=='admin' ||Auth::User()->role=='hod'||Auth::User()->role=='examdept'||Auth::User()->role=='library' )                                            <th>Employee name</th>
                                            @endif
                                            <th>Leave type</th>
                                            <th>Date from</th>
                                            <th>Date to</th>
                                            <th>No of days</th>
                                            <th>Reason</th>
                                            <th>Remark</th>
                                            <th>Action</th>
                                            <th>Image</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                           
                                                
                                        @foreach($leaves as $leave)
                                        
                                            <tr>
                                                <td>{{$loop -> index+1 }}</td>
                                                @if(Auth::User()->role=='vp' || Auth::User()->role=='admin' ||Auth::User()->role=='hod'||Auth::User()->role=='examdept'||Auth::User()->role=='library' )
                                                <td>{{$leave->users->first_name }} {{$leave->users->last_name }}</td>
                                                @endif
                                                @if($leave->leave_type=='sl')
                                                <td>Sick Leave</td>
                                                @elseif($leave->leave_type=='cl')
                                                <td>Casual Leave</td>
                                                @elseif($leave->leave_type=='vac')
                                                <td>Vacation</td>
                                                @elseif($leave->leave_type=='od')
                                                <td>OD</td>
                                                @endif
                                                <td>{{$leave->date_from}}</td>
                                                <td>{{$leave->date_to}}</td>
                                                <td>{{$leave->days}}</td>
                                                <td>{{$leave->reason}}</td>
                                               {{-- @if(Auth::User()->role=='vp' || Auth::User()->role=='admin' ||Auth::User()->role=='hod'||Auth::User()->role=='examdept'||Auth::User()->role=='library' )--}}
                                                @if(Auth::User()->role=='employee')
                                                <td>{{$leave->remark}}</td>
                                                @else
                                            <td><button type="button" data-toggle="modal" data-target="#remarkview" data-whatever="{{$leave->id}}"class="btn btn-sm btn-danger">Remark</button> </td>
                                               @endif
                                                <div class="modal fade" id="remarkview" role="dialog">
                                                    <div class="modal-dialog">
                                                    
                                                      <!-- Modal content-->
                                                      <div class="modal-content">
                                                        <div class="modal-header">
                                                                <h4 class="modal-title">Remarks</h4>
                                                          
                                                        </div>
                                                        <div class="modal-body">
                                                            <form  id="modal-body-form" class="remark-leave-{{$leave->id}}" action="" method="POST"  >{{-- {{route('leave.remark',$leave->id)}}--}}
                                                                <div class="form-group row">
                                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Remarks</label>
                                                                        <div class="col-sm-9">
                                                                        <textarea type="text" name="remark" class="form-control" placeholder="Remarks"></textarea></div>
                                                                    </div>

                                                             @csrf
                                                                    {{--<button type="button" onclick="rejectLeave({{$leave->id}})" class="btn btn-sm btn-danger" name="approve" value="2">Reject</button>--}}
                                                                    <button type="submit"  class="btn btn-sm btn-primary">Submit</button>
                                                                </form>
                                                            </div>
                                                        {{--<div class="modal-footer">
                                                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        </div>--}}
                                                      </div>
                                                      
                                                    </div>
                                                </div>
                                                {{--<td>
                                                    @if(Auth::user()->role=='admin' || Auth::user()->role=='hod')
                                                       
                                                        @if($leave->leave_type_offer==0)
                                                            <form id="{{$leave->id}}" action="{{route('leave.paid',$leave->id)}}" method="POST">
                                                                @csrf
                                                                {{--<button type="button" onclick="approveLeave({{$leave->id}})" class="btn btn-sm btn-cyan" name="approve" value="1">Approve</button>--}}
                                                                {{--<button type="submit" onclick="return confirm('Are you sure want to paid for leave?')" class="btn btn-sm btn-cyan" name="paid" value="1">Paid</button>
                                                            </form>
                                                            <form id="{{$leave->id}}" action="{{route('leave.paid',$leave->id)}}" method="POST">
                                                                @csrf
                                                                {{--<button type="button" onclick="rejectLeave({{$leave->id}})" class="btn btn-sm btn-danger" name="approve" value="2">Reject</button>--}}
                                                                {{--<button type="submit" onclick="return confirm('Are you sure want to paid for leave?')" class="btn btn-sm btn-danger" name="paid" value="2">Unpaid</button>
                                                            </form>
                                                        @elseif($leave->leave_type_offer==1)

                                                            <form action="{{route('leave.paid',$leave->id)}}" method="POST">
                                                                @csrf
                                                                <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure want to unpaid for leave?')" type="submit" name="paid" value="2">Unpaid</button>
                                                            </form>
                                                        @else
                                                            <form action="{{route('leave.paid',$leave->id)}}" method="POST">
                                                                @csrf
                                                                <button class="btn btn-sm btn-cyan" onclick="return confirm('Are you sure want to paid for leave?')" type="submit" name="paid" value="1">Paid</button>
                                                            </form>
                                                        @endif
                                                        
                                                   
                                                    
                                                    @else
                                                        @if($leave->leave_type_offer==0)
                                                            <span class="badge badge-pill badge-warning">Pending</span>
                                                        @elseif($leave->leave_type_offer==1)
                                                            <span class="badge badge-pill badge-success">Paid</span>
                                                        @else
                                                            <span class="badge badge-pill badge-danger">Unpaid</span>
                                                        @endif
                                                    @endif
                                                </td>--}}
                                                <div class="modal fade" id="myModal" role="dialog">
                                                    <div class="modal-dialog">
                                                    
                                                      <!-- Modal content-->
                                                      <div class="modal-content">
                                                        <div class="modal-header">
                                                                <h4 class="modal-title">Reason</h4>
                                                          
                                                        </div>
                                                        <div class="modal-body">
                                                                <form id="reject-leave-{{$leave->id}}" action="{{route('leave.approve',$leave->id)}}" method="POST">
                                                                <div class="form-group row">
                                                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Description</label>
                                                                        <div class="col-sm-9">
                                                                            <textarea type="text" name="rejectionreason" class="form-control" placeholder="Reason for leave rejection"></textarea></div>
                                                                    </div>

                                                             
                                                                    @csrf
                                                                    {{--<button type="button" onclick="rejectLeave({{$leave->id}})" class="btn btn-sm btn-danger" name="approve" value="2">Reject</button>--}}
                                                                    <button type="submit" onclick="return confirm('Are you sure want to reject leave?')" class="btn btn-sm btn-danger" name="approve" value="2">Reject</button>
                                                                </form>
                                                            </div>
                                                        {{--<div class="modal-footer">
                                                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        </div>--}}
                                                      </div>
                                                      
                                                    </div>
                                                </div>
                                                
                                                <td>
                                                    @if(Auth::user()->role=='admin' || Auth::user()->role=='hod')
                                                    {{--{{$leave->is_approved}}--}}
                                                        @if($leave->leave_type !='vac')
                                                        
                                                            @if($leave->is_approved==0)
                                                            @if(Auth::user()->id!=$leave->employee_id)
                                                                <form id="approve-leave-{{$leave->id}}" action="{{route('leave.approve',$leave->id)}}" method="POST">
                                                                    @csrf
                                                                    {{--<button type="button" onclick="approveLeave({{$leave->id}})" class="btn btn-sm btn-cyan" name="approve" value="1">Approve</button>--}}
                                                                    <button type="submit" onclick="return confirm('Are you sure want to approve leave?')" class="btn btn-sm btn-cyan" name="approve" value="1">Approve</button>
                                                                </form>
                                                                <form id="reject-leave-{{$leave->id}}" action="{{route('leave.approve',$leave->id)}}" method="POST">
                                                                    @csrf
                                                                    <button type="submit"  class="btn btn-sm btn-danger" name="approve" value="2">Reject</button>
                                                                    {{--<button type="button" onclick="rejectLeave({{$leave->id}})" class="btn btn-sm btn-danger" name="approve" value="2">Reject</button>--}}
                                                                   {{-- <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-sm btn-danger">Reject</button>--}}

                                                                </form>
                                                            @endif
                                                            @elseif($leave->is_approved==1)
                                                            <span class="badge badge-pill badge-success">Approved</span>      
                                                              {{--  <form action="{{route('leave.approve',$leave->id)}}" method="POST">
                                                                    @csrf
                                                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure want to reject leave?')" type="submit" name="approve" value="2">Reject</button>
                                                                </form>--}}
                                                            @else
                                                            <span class="badge badge-pill badge-danger">Rejected</span>
                                                               {{-- <form action="{{route('leave.approve',$leave->id)}}" method="POST">
                                                                    @csrf
                                                                    <button class="btn btn-sm btn-cyan" onclick="return confirm('Are you sure want to approve leave?')" type="submit" name="approve" value="1">Approve</button>
                                                                </form>--}}
                                                            @endif
                                                           

                                                        @else
                                                        @if($leave->leave_type_offer==0)
                                                                    @if($leave->status==3 && $leave->leave_type=='vac')
                                                                    <button type="button" data-toggle="modal" data-target="#libview" class="btn btn-sm btn-primary">View</button>
                                                            <div class="modal fade" id="libview" role="dialog">
                                                                    <div class="modal-dialog">
                                                                    
                                                                      <!-- Modal content-->
                                                                      <div class="modal-content">
                                                                        <div class="modal-header">
                                                                                <h4 class="modal-title">Action</h4>
                                                                          
                                                                        </div>
                                                                        <div class="modal-body">
                                                                                <form action="/">
                                                                                    <input type="checkbox" class="number" value="One">Departmental work completed<br>
                                                                                    
                                                                                    
                                                                                  </form> 
                                                                                  <form id="approve-leave-{{$leave->id}}" action="{{route('leave.status',$leave->id)}}" method="POST">
                                                                                        @csrf
                                                                                        {{--<button type="button" onclick="approveLeave({{$leave->id}})" class="btn btn-sm btn-cyan" name="approve" value="1">Approve</button>--}}
                                                                                        <button type="submit" disabled id="btn" onclick="return confirm('Are you sure want to approve leave?')" class="btn btn-sm btn-cyan" name="approve" value="4">Approve</button>
                                                                                    </form>
                                                                                    <form id="reject-leave-{{$leave->id}}" action="{{route('leave.approve',$leave->id)}}" method="POST">
                                                                                        @csrf
                                                     
                                                                                        {{--<button type="button" onclick="rejectLeave({{$leave->id}})" class="btn btn-sm btn-danger" name="approve" value="2">Reject</button>--}}
                                                                                        <button type="submit" onclick="return confirm('Are you sure want to reject leave?')" class="btn btn-sm btn-danger" name="approve" value="2">Reject</button>
                                                                                    </form>
                                                                            </div>
                                                                    @elseif($leave->status==4 && $leave->leave_type=='vac')
                                                                    <span class="badge badge-pill badge-success">Approved</span>
                                                                    @endif
                                                                    @endif
                                                                    @endif
                                                                    @elseif(Auth::user()->role=='library')
                                                                    {{--{{$leave->is_approved}}--}}
                                                                        @if($leave->is_approved==0)
                                                                         @if(($leave->status==2 && $leave->leave_type=='vac')||($leave->status==1 && $leave->leave_type=='vac'))
                                                                            <button type="button" data-toggle="modal" data-target="#libview" class="btn btn-sm btn-primary">View</button>
                                                                            <div class="modal fade" id="libview" role="dialog">
                                                                                    <div class="modal-dialog">
                                                                                    
                                                                                      <!-- Modal content-->
                                                                                      <div class="modal-content">
                                                                                        <div class="modal-header">
                                                                                                <h4 class="modal-title">Action</h4>
                                                                                          
                                                                                        </div>
                                                                                        <div class="modal-body">
                                                                                                <form action="/">
                                                                                                    <input type="checkbox" class="number" value="One">No books due<br>
                                                                                                    
                                                                                                    
                                                                                                  </form> 
                                                                                                  <form id="approve-leave-{{$leave->id}}" action="{{route('leave.status',$leave->id)}}" method="POST">
                                                                                                        @csrf
                                                                                                        {{--<button type="button" onclick="approveLeave({{$leave->id}})" class="btn btn-sm btn-cyan" name="approve" value="1">Approve</button>--}}
                                                                                                        @if($leave->status==2)
                                                                                                        <button type="submit" disabled id="btn" onclick="return confirm('Are you sure want to approve leave?')" class="btn btn-sm btn-cyan" name="approve" value="3">Approve</button>
                                                                                                        @elseif($leave->status==1)
                                                                                                        <button type="submit" disabled id="btn" onclick="return confirm('Are you sure want to approve leave?')" class="btn btn-sm btn-cyan" name="approve" value="5">Approve</button>
                                                                                                        @endif
                                                                                                    </form>
                                                                                                    <form id="reject-leave-{{$leave->id}}" action="{{route('leave.approve',$leave->id)}}" method="POST">
                                                                                                        @csrf
                                                                     
                                                                                                        {{--<button type="button" onclick="rejectLeave({{$leave->id}})" class="btn btn-sm btn-danger" name="approve" value="2">Reject</button>--}}
                                                                                                        <button type="submit" onclick="return confirm('Are you sure want to reject leave?')" class="btn btn-sm btn-danger" name="approve" value="2">Reject</button>
                                                                                                    </form>
                                                                                            </div>
                                                                            
                                                                            @else
                                                                            <span class="badge badge-pill badge-success">Approved</span>
                                                                            @endif
                                                                        @endif
                                                                    @elseif(Auth::user()->role=='examdept')
                                                                        {{--{{$leave->is_approved}}--}}
                                                                            
                                                                                @if(($leave->status==5 && $leave->leave_type=='vac')||($leave->status==1 && $leave->leave_type=='vac'))
                                                                                <button type="button" data-toggle="modal" data-target="#libview" class="btn btn-sm btn-primary">View</button>
                                                                            <div class="modal fade" id="libview" role="dialog">
                                                                                    <div class="modal-dialog">
                                                                                    
                                                                                      <!-- Modal content-->
                                                                                      <div class="modal-content">
                                                                                        <div class="modal-header">
                                                                                                <h4 class="modal-title">Action</h4>
                                                                                          
                                                                                        </div>
                                                                                        <div class="modal-body">
                                                                                                <form action="/">
                                                                                                    <input type="checkbox" class="number" value="One">Term work/ Oral/ Practical / Mark sheets submitted<br>
                                                                                                    <input type="checkbox" class="number" value="Two">CAP work/ Paper corrections<br>
                                                                                                    
                                                                                                    
                                                                                                  </form> 
                                                                                                  <form id="approve-leave-{{$leave->id}}" action="{{route('leave.status',$leave->id)}}" method="POST">
                                                                                                        @csrf
                                                                                                        @if($leave->status==5)
                                                                                                        <button type="submit" disabled id="btn" onclick="return confirm('Are you sure want to approve leave?')" class="btn btn-sm btn-cyan" name="approve" value="3">Approve</button>
                                                                                                        @elseif($leave->status==1)
                                                                                                        <button type="submit" disabled id="btn" onclick="return confirm('Are you sure want to approve leave?')" class="btn btn-sm btn-cyan" name="approve" value="2">Approve</button>
                                                                                                        @endif
                                                                                                    </form>
                                                                                                    <form id="reject-leave-{{$leave->id}}" action="{{route('leave.approve',$leave->id)}}" method="POST">
                                                                                                        @csrf
                                                                     
                                                                                                        <button type="submit" onclick="return confirm('Are you sure want to reject leave?')" class="btn btn-sm btn-danger" name="approve" value="2">Reject</button>
                                                                                                    </form>
                                                                                            </div>
                                                                                @elseif(($leave->status==3 || $leave->status==4) && $leave->leave_type=='vac')
                                                                                    <span class="badge badge-pill badge-success">Approved</span>
                                                                               
                                                                                @endif
                                                    {{--@elseif(Auth::user()->role=='library')
                                                   
                                                        @if($leave->is_approved==0)
                                                            @if($leave->status==1 && $leave->leave_type=='vac' )
                                                            <button type="button" data-toggle="modal" data-target="#libview" class="btn btn-sm btn-primary">View</button>
                                                            <div class="modal fade" id="libview" role="dialog">
                                                                    <div class="modal-dialog">
                                                                    
                                                                      <!-- Modal content-->
                                                                      <div class="modal-content">
                                                                        <div class="modal-header">
                                                                                <h4 class="modal-title">Action</h4>
                                                                          
                                                                        </div>
                                                                        <div class="modal-body">
                                                                                <form action="/">
                                                                                    <input type="checkbox" class="number" value="One">No books due<br>
                                                                                    
                                                                                    
                                                                                  </form> 
                                                                                  <form id="approve-leave-{{$leave->id}}" action="{{route('leave.status',$leave->id)}}" method="POST">
                                                                                        @csrf
                                                                                        {{--<button type="button" onclick="approveLeave({{$leave->id}})" class="btn btn-sm btn-cyan" name="approve" value="1">Approve</button>--}
                                                                                        <button type="submit" disabled id="btn" onclick="return confirm('Are you sure want to approve leave?')" class="btn btn-sm btn-cyan" name="approve" value="2">Approve</button>
                                                                                    </form>
                                                                                    <form id="reject-leave-{{$leave->id}}" action="{{route('leave.approve',$leave->id)}}" method="POST">
                                                                                        @csrf
                                                     
                                                                                        {{--<button type="button" onclick="rejectLeave({{$leave->id}})" class="btn btn-sm btn-danger" name="approve" value="2">Reject</button>--}
                                                                                        <button type="submit" onclick="return confirm('Are you sure want to reject leave?')" class="btn btn-sm btn-danger" name="approve" value="2">Reject</button>
                                                                                    </form>
                                                                            </div>
                                                            
                                                            @else
                                                            <span class="badge badge-pill badge-success">Approved</span>
                                                            @endif
                                                        @endif
                                                    @elseif(Auth::user()->role=='examdept')
                                                        {{--{{$leave->is_approved}}--}
                                                            
                                                                @if($leave->status==2 && $leave->leave_type=='vac')
                                                                <button type="button" data-toggle="modal" data-target="#libview" class="btn btn-sm btn-primary">View</button>
                                                            <div class="modal fade" id="libview" role="dialog">
                                                                    <div class="modal-dialog">
                                                                    
                                                                      <!-- Modal content-->
                                                                      <div class="modal-content">
                                                                        <div class="modal-header">
                                                                                <h4 class="modal-title">Action</h4>
                                                                          
                                                                        </div>
                                                                        <div class="modal-body">
                                                                                <form action="/">
                                                                                    <input type="checkbox" class="number" value="One">Term work/ Oral/ Practical / Mark sheets submitted<br>
                                                                                    <input type="checkbox" class="number" value="Two">CAP work/ Paper corrections<br>
                                                                                    
                                                                                    
                                                                                  </form> 
                                                                                  <form id="approve-leave-{{$leave->id}}" action="{{route('leave.status',$leave->id)}}" method="POST">
                                                                                        @csrf
                                                                                        <button type="submit" disabled id="btn" onclick="return confirm('Are you sure want to approve leave?')" class="btn btn-sm btn-cyan" name="approve" value="3">Approve</button>
                                                                                    </form>
                                                                                    <form id="reject-leave-{{$leave->id}}" action="{{route('leave.approve',$leave->id)}}" method="POST">
                                                                                        @csrf
                                                     
                                                                                        <button type="submit" onclick="return confirm('Are you sure want to reject leave?')" class="btn btn-sm btn-danger" name="approve" value="2">Reject</button>
                                                                                    </form>
                                                                            </div>
                                                                @elseif(($leave->status==3 || $leave->status==4) && $leave->leave_type=='vac')
                                                                    <span class="badge badge-pill badge-success">Approved</span>
                                                               
                                                                @endif--}}
                                                                @elseif(Auth::user()->role=='vp')
                                                                            
                                                                    
                                                                        @if(($leave->status==4 && $leave->leave_type=='vac' && $leave->is_approved==0) || $leave->leave_type!='vac')
                                                                        
                                                                        
                                                                        
                                                                        <form id="approve-leave-{{$leave->id}}" action="{{route('leave.approve',$leave->id)}}" method="POST">
                                                                            @csrf
                                                                            <button type="submit"  id="btn"  class="btn btn-sm btn-cyan" name="approve" value="1">Approve</button>
                                                                        </form>
                                                                        <form id="reject-leave-{{$leave->id}}" action="{{route('leave.approve',$leave->id)}}" method="POST">
                                                                            @csrf
                                                                            <button type="submit" onclick="return confirm('Are you sure want to reject leave?')" class="btn btn-sm btn-danger" name="approve" value="2">Reject</button>
                                                                        </form>
                                                                        @elseif($leave->is_approved==1 )
                                                                            <span class="badge badge-pill badge-success">Approved</span>
                                                                            @elseif($leave->status==1 || $leave->status==2 || $leave->status==3 )
                                                                            <span class="badge badge-pill badge-warning">Pending</span>
                                                                        @endif        
                                                       @else
                                                    @if($leave->leave_type!='vac' )
                                                    
                                                        @if($leave->is_approved==2)
                                                            
                                                        <span class="badge badge-pill badge-danger">Rejected</span>
                                                        @elseif($leave->is_approved==1)
                                                            <span class="badge badge-pill badge-success">Approved</span>
                                                        @elseif($leave->is_approved==0)
                                                        <span class="badge badge-pill badge-warning">Pending</span>
                                                        <a href="{{url('leave/edit/'.$leave->id)}}" class="btn btn-sm btn-cyan">Edit</a>
                                                        <a href="{{url('leave/delete/'.$leave->id)}}" class="btn btn-sm btn-danger">Delete</a>
                                                        @endif
                                                    @else
                                                    @if($leave->leave_type=='vac' && $leave->is_approved==0)
                                                                    <button type="button" data-toggle="modal" data-target="#empview" class="btn btn-sm btn-primary">View </button>
                                                    <div class="modal fade" id="empview" role="dialog">
                                                            <div class="modal-dialog">
                                                            
                                                              <!-- Modal content-->
                                                              <div class="modal-content">
                                                                <div class="modal-header">
                                                                        <h4 class="modal-title">Status</h4>
                                                                  
                                                                </div>
                                                                <div class="modal-body">
                                                                        <div class="table-responsive">
                                                                                <table id="zero_config" class="table table-striped table-bordered">
                                                                                <thead>
                                                                                <tr>
                                                                                    <th>Library</th>
                                                                                    <th>Exam Department</th>
                                                                                    <th>HOD</th>
                                                                                    <th>VP</th>
                                                                                    
                                                                                </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    @if($leave->is_approved=='0')
                                                                                      
                                                                                    @if($leave->status=='1')
                                                                                    <td><span class="badge badge-pill badge-warning">Pending</span></td>
                                                                                    <td><span class="badge badge-pill badge-warning">Pending</span></td>
                                                                                    <td><span class="badge badge-pill badge-warning">Pending</span></td>
                                                                                    <td><span class="badge badge-pill badge-warning">Pending</span></td>
                                                                                    @elseif($leave->status=='2')
                                                                                    <td><span class="badge badge-pill badge-warning">Pending</span></td>
                                                                                    <td> <span class="badge badge-pill badge-success">Approved</span></td>
                                                                                    <td><span class="badge badge-pill badge-warning">Pending</span></td>
                                                                                    <td><span class="badge badge-pill badge-warning">Pending</span></td>
                                                                                    @elseif($leave->status=='3')
                                                                                    <td> <span class="badge badge-pill badge-success">Approved</span></td>
                                                                                    <td><span class="badge badge-pill badge-success">Approved</span></td>
                                                                                    <td><span class="badge badge-pill badge-warning">Pending</span></td>
                                                                                    <td><span class="badge badge-pill badge-warning">Pending</span></td>
                                                                                    @elseif($leave->status=='4')
                                                                                    <td> <span class="badge badge-pill badge-success">Approved</span></td>
                                                                                    <td><span class="badge badge-pill badge-success">Approved</span></td>
                                                                                    <td><span class="badge badge-pill badge-success">Approved</span></td>
                                                                                    <td><span class="badge badge-pill badge-warning">Pending</span></td>
                                                                                    @elseif($leave->status=='5')
                                                                                    <td> <span class="badge badge-pill badge-success">Approved</span></td>
                                                                                    <td><span class="badge badge-pill badge-warning">Pending</span></td>
                                                                                    <td><span class="badge badge-pill badge-warning">Pending</span></td>
                                                                                    <td><span class="badge badge-pill badge-warning">Pending</span></td>
                                                                                    @endif
                                                                                    @elseif($leave->is_approved=='1')
                                                                                    <td> <span class="badge badge-pill badge-success">Approved</span></td>
                                                                                    <td><span class="badge badge-pill badge-success">Approved</span></td>
                                                                                    <td><span class="badge badge-pill badge-success">Approved</span></td>
                                                                                    <td><span class="badge badge-pill badge-success">Approved</span></td>
                                                                                    @endif      
                                                                                
                                                                                </tbody>
                                                                            </table>
                                                                           
                                                                        </div>   
                                                                         
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            </div>
                                                                    @elseif($leave->is_approved==1)
                                                                    <span class="badge badge-pill badge-success">Approved</span>
                                                                @else
                                                                    <span class="badge badge-pill badge-danger">Rejected</span>
                                                                @endif
                                                    
                                                    @endif
                                                    @endif
                                                </td>
                                             <td>
                                            @if($leave->image!='none')                                                                                                                                                
                                           {{-- <img id={{$leave->image}} src="{{ asset('uploads/gallery/' . $leave->image) }}" width="80px" height="80px" alt="Image">--}}
                                             <button type="button" data-toggle="modal" data-target="#imgview" data-value="{{$leave->image}}" class="btn btn-sm btn-primary">View</button>
                                            
                                                <div class="modal fade" id="imgview" role="dialog">
                                                            <div class="modal-dialog">
                                                            
                                                              <!-- Modal content-->
                                                              <div class="modal-content">
                                                                <div class="modal-header">
                                                                        <h4 class="modal-title">Image/Document</h4>
                                                                  
                                                                </div>
                                                                <div class="modal-body">

                                                                        @if($leave->image=='none')
                                                                        No Image Uploaded
                                                                        @else
                                                                        <label for="image">
                                                                        <img id="modal-image-id" src=""  alt="Image">{{--{{ asset('uploads/gallery/' . $leave->image) }}--}}
                                                                        </label>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                    </div>
                                                </div>  
                                                @endif                                                   
                                                </td> 
                                            </tr>
                                            
                                        </tbody>
                                        @endforeach
                                        
                                    </table>
                                    {{ $leaves->links() }}
                                </div>

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