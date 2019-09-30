@extends('admin.layout.master')

@section('content')

    <div id="main-wrapper">
    @include('admin.includes.sidebar')

        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row">
                   
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                               
                                
                                <div class="card-body">
                                        <h4 class="page-title">Leaves Reset</h4>
                                        </div>
                                        <div class="card-body">
                                            <button onclick="showthis('resetSem')" class="btn btn-dark" id="resetSem">Reset leaves (sem) </button>
                                        </div>
                                        
                                       
                            </div>
                        <form method ="post" action="{{route('changesem')}}">
                            @csrf
                            <div class="form-group row">
                                <label name="datelabel" class="col-sm-3 text-right control-label col-form-label" id ="datelabel" style="visibility: hidden;">Enter the Dates for vacations</label>
                                <div class="col-sm-4">
                                    <input type="date" name="fd"  class="form-control" id="fd" style="visibility: hidden;">
                                </div>
                                <div class="col-sm-4">
                                    <input type="date" name="td" class="form-control" id="td" style="visibility: hidden;">
                                </div>
                            </div>
                            <div class="card-body">
                           <center> <button name="submitdates" type="submit" onclick="return confirm('Are you sure want to reset leaves?')" class="btn btn-dark" style="visibility: hidden;" id="submitdates">Okay</button></center>
                            </div>
                        </form>
                        <div class="card-body">
                            <button onclick="showthis('reset')" type="submit"onclick="return confirm('Are you sure want to reset leave?')" class="btn btn-dark" id="resetYear">Reset leaves (year)</button>
                        </div>
                        <form method ="post" action="{{route('change')}}">
                            @csrf
                            <div class="form-group row">
                                <label name="datelabel2" class="col-sm-3 text-right control-label col-form-label" id ="datelabel2" style="visibility: hidden;">Enter the Dates for vacations</label>
                                <div class="col-sm-4">
                                    <input type="date" name="fd2"  class="form-control" id="fd2" style="visibility: hidden;">
                                </div>
                                <div class="col-sm-4">
                                    <input type="date" name="td2" class="form-control" id="td2" style="visibility: hidden;">
                                </div>
                            </div>
                            <div class="card-body">
                           <center> <button name="submitdates2" type="submit" onclick="return confirm('Are you sure want to reset leaves?')" class="btn btn-dark" style="visibility: hidden;" id="submitdates2">Okay</button></center>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>

            </div>

            {{--sweetalert box for deleting start--}}
           

            

        </div>

    </div>
    
@endsection
@section('js')
<script>
function showthis(bttype){
    if(bttype=="resetSem"){
    var from = document.getElementById("fd");
    var to = document.getElementById("td");
    var lab = document.getElementById("datelabel");
    var sub = document.getElementById("submitdates");
   
    }else if (bttype=="reset") {
    var from = document.getElementById("fd2");
    var to = document.getElementById("td2");
    var lab = document.getElementById("datelabel2");
    var sub = document.getElementById("submitdates2");
    
    } 
    from.style.visibility='visible';
    to.style.visibility='visible';
    lab.style.visibility='visible';
    sub.style.visibility='visible';
 }
</script>
@endsection