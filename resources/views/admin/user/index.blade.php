@extends('admin.layout.master')

@section('content')

    <div id="main-wrapper">

        {{--@include('admin.includes.sidebar')--}}

        <div class="page-wrapper">

            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Admin Manager</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><a href="{{route('user')}}">User</a></li>
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
                            <form action="{{route('user.search')}}" method="GET" class="form-horizontal">
                                <div class="card-body">
                                    <h4 class="card-title">Search</h4>
                                    <div class="form-group row">
                                        <label class="col-sm-3 text-right control-label col-form-label">Search by employee name</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="search" class="form-control" id="fname" placeholder="Employee name">
                                        </div>
                                    </div>
                                </div>
                                <div class="border-top">
                                    <div class="card-body">
                                        <button type="submit" class="btn btn-success">Search</button>
                                        <a href="{{route('user')}}" class="btn btn-md btn-danger">Clear</a>
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
                                <h5 class="card-title m-b-0">Admin</h5>
                            </div>
                            <div class="table-responsive">
                                <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>S.N</th>
                                    <th>Username</th>
                                    <th>Image</th>
                                    <th>Role</th>
                                    <th>Email</th>
                                    <th>Leaves count</th>
                                    <th>Late marks</th>
                                    <th>View Profile</th>
                                </tr>
                                </thead>
                                <tbody>
                                
                                @foreach($users as $user)
                                    <tr>
                                        <th>{{$loop->index+1}}</th>
                                        <td>{{$user->username}}</td>
                                        <td><img src="{{ asset('uploads/gallery/' . $user->image) }}" width="80px" height="80px" alt="Image"> </td>
                                        <td>{{$user->role}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>
                                                <button type="button"
                                                    sl="{{$user->sl}}"
                                                    cl="{{$user->cl}}"
                                                    vac="{{$user->vac}}"
                                                    od="{{$user->od}}"

                                                    class="view-data1 btn btn-sm btn-success">View</button>
                                        </td>
                                        <td>
                                                <!--form method="POST"--> 
                                             <input onclick="change({{$loop->index+1}},{{$user->id}})" class="btn btn-sm btn-info" value="{{$user->late_count}}" id="{{$loop->index+1}}">
                                                <!--/form--> 
                                                 </td>    
                                        <td>
                                            <button type="button"
                                                    username="{{$user->username}}"
                                                    role="{{$user->role}}"
                                                    email="{{$user->email}}"
                                                    
                                                    phone="{{$user->phone}}"
                                                    address="{{$user->address}}"
                                                    gender="{{$user->gender}}"
                                                    dob="{{$user->dob}}"
                                                    join_date="{{$user->join_date}}"
                                                    job_type="{{$user->job_type}}"
                                                    department="{{$user->department}}"
                                                    class="view-data btn btn-sm btn-success">View</button>
                                            {{--<a href="{{route('managesalary.detail',$user->id)}}" class="btn btn-sm btn-warning">Payment</a>--}}
                                            {{-- <form id="delete-form-{{ $user->id }}" action="{{route('user.delete',$user->id)}}" method="put">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" onclick="deletePost({{ $user->id }})" class="btn btn-sm btn-danger">Delete</button>
                                            </form> --}}
                                        </td>
                                    </tr>

                                @endforeach
                                </tbody>
                            </table>
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
            </div>

                <script>
                    $('.view-data').click(function(){
                        var username=$(this).attr('username');
                        var role=$(this).attr('role');
                        var email=$(this).attr('email');
                        var department=$(this).attr('department');
                        var phone=$(this).attr('phone');
                        var address=$(this).attr('address');
                        var gender=$(this).attr('gender');
                        var dob=$(this).attr('dob');
                        var join_date=$(this).attr('join_date');
                        var job_type=$(this).attr('job_type');
                       
                        
                        
                        $('#username').text(username);
                        $('#role').text(role);
                        $('#email').text(email);
                        $('#department').text(department);
                        $('#phone').text(phone);
                        $('#address').text(address);
                        $('#gender').text(gender);
                        $('#dob').text(dob);
                        $('#join_date').text(join_date);
                        $('#job_type').text(job_type);
                       
                        
                        $('#show-data').modal();
                    })
                </script>
                 <script>
                        $('.view-data1').click(function(){
                            
                            var sl=$(this).attr('sl');
                            var slb=10-sl;
                            var cl=$(this).attr('cl');
                            var clb=8-cl;
                            var od=$(this).attr('od');
                            var odb=6-od;
                            var vac=$(this).attr('vac');
                            var vacb=70-vac;
                            
                            $('#sl').text(sl);
                            $('#slb').text(slb);
                            $('#cl').text(cl);
                            $('#clb').text(clb);
                            $('#vac').text(vac);
                            $('#vacb').text(vacb);
                            $('#od').text(od);
                            $('#odb').text(odb);
                            $('#show-data1').modal();
                        })
                    </script>

                {{--sweetalert box for deleting start--}}
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.28.8/dist/sweetalert2.all.min.js"></script>

                <script type="text/javascript">
                function change(pthis,id) 

{
    
    var elem = document.getElementById(pthis);
    
   
    if (elem.value =="3"){
        elem. value = "0";
        window.location.href ="/deductcl/"+id; 
        
    }else if(elem.value =="2"){
        elem. value = "3"; 
        window.location.href ="/latecnt/"+id;
         
    }else if(elem.value =="1"){
        elem. value = "2"; 
        window.location.href ="/latecnt/"+id; 
        
    }else{
        elem. value = "1";
       window.location.href ="/latecnt/"+id; 
        
    }
    }
                    function deletePost(id)

                    {
                        const swalWithBootstrapButtons = swal.mixin({
                            confirmButtonClass: 'btn btn-success',
                            cancelButtonClass: 'btn btn-danger',
                            buttonsStyling: false,
                        })

                        swalWithBootstrapButtons({
                            title: 'Are you sure?',
                            text: "You won't be able to revert this!",
                            type: 'warning',
                            showCancelButton: true,
                            confirmButtonText: 'Yes, delete it!',
                            cancelButtonText: 'No, cancel!',
                            reverseButtons: true
                        }).then((result) => {
                            if (result.value) {
                                event.preventDefault();
                                document.getElementById('delete-form-'+id).submit();
                            } else if (
                                // Read more about handling dismissals
                                result.dismiss === swal.DismissReason.cancel
                            ) {
                                swalWithBootstrapButtons(
                                    'Cancelled',
                                    'Your file is safe :)',
                                    'error'
                                )
                            }
                        })
                    }

                </script>
                {{--sweetalert box for deleting end--}}

                <div id="show-data" class="modal fade" id="view-data" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Details</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                    <table style="width:50%">
                                            <tr>
                                              <th>Username:</th>
                                              <td id="username"></td>
                                            </tr>
                                            <tr>
                                              <th>Role:</th>
                                              <td id="role"></td>
                                            </tr>
                                            <tr>
                                              <th>Email:</th>
                                              <td id="email"></td>
                                            </tr>
                                            <tr>
                                                <th>Phone:</th>
                                                <td id="phone"></td>
                                            </tr>
                                            <tr>
                                                <th>Address:</th>
                                                <td id="address"></td>
                                            </tr>
                                            <tr>
                                                <th>Gender:</th>
                                                <td id="gender"></td>
                                            </tr>
                                            <tr>
                                                <th>DOB:</th>
                                                <td id="dob"></td>
                                            </tr>
                                            <tr>
                                                <th>Join Date:</th>
                                                <td id="join_date"></td>
                                            </tr>
                                            <tr>
                                                <th>Department:</th>
                                                <td id="department"></td>
                                            </tr>
                                            <tr>
                                                <th>Job Type:</th>
                                                <td id="job_type"></td>
                                            </tr>
                                    </table>
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div id="show-data1" class="modal fade" id="view-data1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Available Leaves</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                        <table style="width:50%">
                                                <tr>    <th></th>
                                                        <th>Balance</th>
                                                        <th>Used</th>
                                                    </tr>
                                                <tr>
                                                  <th>Sick Leave:</th>
                                                  <td id="sl"></td>
                                                  <td id="slb"> </td>
                                                </tr>
                                                <tr>
                                                  <th>Casual Leave:</th>
                                                  <td id="cl"></td>
                                                  <td id="clb"></td>
                                                </tr>
                                                <tr>
                                                  <th>Vacation:</th>
                                                  <td id="vac"></td>
                                                  <td id="vacb"></td>
                                                </tr>
                                                <tr>
                                                        <th>OD:</th>
                                                        <td id="od"></td>
                                                        <td id="odb"></td>
                                                </tr>
                                        </table>
                                </div>
                            </div>
                        </div>
                    </div>

                {{--@section('js')--}}
                    {{--@endsection--}}

            
        </div>
        </div>
    </div>

    @endsection