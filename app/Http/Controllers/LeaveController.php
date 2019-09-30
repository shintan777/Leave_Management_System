<?php

namespace App\Http\Controllers;

use App\User;
use App\Leave;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\LeaveRequest;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Carbon;

class LeaveController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        $leaves=Leave::all();
        if(Auth::user()->role=='admin') {
            $leaves = Leave::paginate(10);
        }elseif(Auth::user()->role=='employee'){
            $leaves =  Auth::user()->leave()->paginate(10);
        }
        elseif(Auth::user()->role=='hod'){
            $dept=Auth::user()->department;
            $leaves =Leave::where('department', $dept)->orderBy('is_approved','asc')->paginate(10);
        }
        elseif(Auth::user()->role=='vp'){
            $vps=User::where('role','=','hod')->get('id');
            $leaves=Leave::whereIn('employee_id',$vps)->orWhere('leave_type', '=', 'vac')->paginate(10);
            
        }
        elseif(Auth::user()->role=='library' ||Auth::user()->role=='examdept' ||Auth::user()->role=='vp')
        {
            $leaves= Leave::where('leave_type', '=', 'vac')->paginate(10);
        }
        return view('admin.leave.index',compact('leaves','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $count = Leave::where('employee_id','=',Auth::user()->id)->where('leave_type','=','vac')->where('is_approved','!=','2')->count();
        $leaves=Leave::all();
        $mytime = Carbon\Carbon::now();
        return view('admin.leave.create',compact('count','leaves','mytime'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LeaveRequest $request)
    {   
        $user = Auth::user();
        $id=Auth::id();
        $lt = $request->leave_type;
        $day_type=$lt.'days';
        $days=$request->$day_type;
        $cnt=$user->$lt;
        $filename= 'none';
        if($request->hasfile('image')){
           
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file -> move('uploads/gallery/', $filename);
           
        }
       
       
        if($lt=='cl'){
            $ans =Leave::where('employee_id',$id)->where('leave_type','sl')->get();
            foreach ($ans as $value) {
              $sle=date_create($value->date_to);
              $cle=date_create($request->cldate_to);
              $cls=date_create($request->cldate_from);
              $sls=date_create($value->date_from);
            $diffs=date_diff($sls,$cls)->format("%R%a");
            if($diffs>0){
             if(date_diff($sle,$cls)->format("%R%a")<=1){
                Toastr::warning('Sick and Casual leaves cannot be continuous!');
                return redirect()->route('leave.create');  
             }               
            }else{
                if(date_diff($cle,$sls)->format("%R%a")<=1){
                    Toastr::warning('Sick and Casual leaves cannot be continuous!');
                    return redirect()->route('leave.create');   
            }
           }
       
        }
    }
    elseif($lt=='sl'){
        $ans =Leave::where('employee_id',$id)->where('leave_type','cl')->get();
        foreach ($ans as $value) {
          $sle=date_create($request->sldate_to);
          $cle=date_create($value->date_to);
          $cls=date_create($value->date_from);
          $sls=date_create($request->sldate_from);
        $diffs=date_diff($sls,$cls)->format("%R%a");
        if($diffs>0){
         if(date_diff($sle,$cls)->format("%R%a")<=1){
            Toastr::warning('Sick and Casual leaves cannot be continuous!');
            return redirect()->route('leave.create');  
         }               
        }else{
            if(date_diff($cle,$sls)->format("%R%a")<=1){
                Toastr::warning('Sick and Casual leaves cannot be continuous!');
                return redirect()->route('leave.create');   
        }
       }
   
    }
}elseif($lt=='vac'){

$curVac = DB::select(' select * from vac_days order by id desc limit 1');

              $cure=date_create($curVac[0]->to_date);
              $le=date_create($request->vacdate_to);
              $ls=date_create($request->vacdate_from);
              $curs=date_create($curVac[0]->from_date);
              if(date_diff($ls , $curs)->format("%R%a")>0 ||date_diff($le, $cure)->format("%R%a")<0  ){
                Toastr::warning('Enter vacation dates as per this semester!');
                return redirect()->route('leave.create');
              }
            }
    $ans =Leave::where('employee_id',$id)->get();
            foreach ($ans as $value) {
              $date_to = $lt.'date_to';
              $date_from = $lt.'date_from';
              
              $sle=date_create($value->date_to);
              $cle=date_create($request->$date_to);
              $cls=date_create($request->$date_from);
              $sls=date_create($value->date_from);
              
            $diffs=date_diff($sls,$cls)->format("%R%a");
            if($diffs>0){
             if(date_diff($sle,$cls)->format("%R%a")<=0){
                Toastr::warning('Leave dates already taken!');
                return redirect()->route('leave.create');  
             }               
            }else{
                if(date_diff($cle,$sls)->format("%R%a")<=0){
                    Toastr::warning('Leave dates already taken!');
                    return redirect()->route('leave.create');   
            }
           }
       
        }
if($cnt-$days<0){
            Toastr::warning('Not enough leaves in balance');
            return redirect()->route('leave.create');
        }
        else{
if($lt=="sl"){
            Leave::create([
                'employee_id'   => $id,
                'leave_type'    => $request->leave_type,
                'date_from'     => $request->sldate_from,
                'date_to'       => $request->sldate_to,
                'days'          => $request->sldays,
                'reason'        => $request->slreason,
                'department'    => $user->department,
                'rejectionreason' =>$request->rejectionreason,
                'remark' =>'None',
                'image'=> $filename,
            ]);
            Toastr::success('Leave successfully requested!','Success');
            return redirect()->route('leave');
        }elseif($lt=="cl"){
            Leave::create([
                'employee_id'   => $id,
                'leave_type'    => $request->leave_type,
                'date_from'     => $request->cldate_from,
                'date_to'       => $request->cldate_to,
                'days'          => $request->cldays,
                'reason'        => $request->clreason,
                'department'    => $user->department,
                'rejectionreason' =>$request->rejectionreason,
                'remark' =>'None',
                'image'=> $filename,
            ]);
            Toastr::success('Leave successfully requested !','Success');
            return redirect()->route('leave');

        }elseif($lt=="vac"){
            Leave::create([
                'employee_id'   => $id,
                'leave_type'    => $request->leave_type,
                'date_from'     => $request->vacdate_from,
                'date_to'       => $request->vacdate_to,
                'days'          => $request->vacdays,
                'reason'        => $request->vacreason,
                'department'    => $user->department,
                'rejectionreason' =>$request->rejectionreason,
                'remark' =>'None',
                'image'=> $filename,
            ]);
            Toastr::success('Leave successfully requested!','Success');
            return redirect()->route('leave');

        }elseif($lt=="od"){
            Leave::create([
                'employee_id'   =>  $id,
                'leave_type'    => $request->leave_type,
                'date_from'     => $request->oddate_from,
                'date_to'       => $request->oddate_to,
                'days'          => $request->oddays,
                'reason'        => $request->odreason,
                'department'    => $user->department,
                'rejectionreason' =>$request->rejectionreason,
                'remark' =>'None',
                'image'=> $filename,
            ]);
            Toastr::success('Leave successfully requested !','Success');
            return redirect()->route('leave');

        }elseif($lt=="early"){
            Leave::create([
                'employee_id'   =>  $id,
                'leave_type'    => $request->leave_type,
                'date_from'     => $request->earlydate_from,
                'date_to'       => $request->earlydate_from,
                'days'          => $request->earlydays,
                'reason'        => $request->earlyreason,
                'department'    => $user->department,
                'rejectionreason' =>$request->rejectionreason,
                'remark' =>'None',
                'image'         =>$filename,
            ]);
            Toastr::success('Leave successfully requested !','Success');
            return redirect()->route('leave');

        }
       
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
//        dd($request->all());
           // $leave = $request -> get('search');
           $user = Auth::user();

            $leaves =Leave::where('leave_type', 'LIKE',"%{$request->search}%")->paginate();
            return view('admin.leave.index',compact('leaves'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $leave = new  Leave ;
       $leaves=Leave::find($id);
        return view('admin.leave.edit',compact('leaves'));

        
       
        
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        /*$request -> validate([
           
            'leave_type' => 'required',
            'date_from' => 'required',
            'date_to' => 'required',
            'days' => 'required',
            'reason' => 'required',
            
        
        ]);*/
        
            
            $leave=Leave::find($id);
            $filename=$leave->image;
            $leave->delete();
            
            if($request->hasfile('image')){
           
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = time().'.'.$extension;
                $file -> move('uploads/gallery/', $filename);
               
            }
            $user = Auth::user();
            $lt = $request->leave_type;
            $days=$request->days;
            $cnt=$user->$lt;
            $idd=Auth::id();
           if($lt=='cl'){
            $ans =Leave::where('employee_id',$idd)->where('leave_type','sl')->get();
            foreach ($ans as $value) {
              $sle=date_create($value->date_to);
              $cle=date_create($request->date_to);
              $cls=date_create($request->date_from);
              $sls=date_create($value->date_from);
            $diffs=date_diff($sls,$cls)->format("%R%a");
            if($diffs>0){
             if(date_diff($sle,$cls)->format("%R%a")<=1){
                Toastr::warning('Leave dates not valid!');
                return redirect()->route('leave.create');  
             }               
            }else{
                if(date_diff($cle,$sls)->format("%R%a")<=1){
                    Toastr::warning('Leave dates not valid!');
                    return redirect()->route('leave.create');   
            }
           }
       
        }
    }
    if($lt=='sl'){
        $ans =Leave::where('employee_id',$idd)->where('leave_type','cl')->get();
        foreach ($ans as $value) {
          $sle=date_create($request->date_to);
          $cle=date_create($value->date_to);
          $cls=date_create($value->date_from);
          $sls=date_create($request->date_from);
        $diffs=date_diff($sls,$cls)->format("%R%a");
        if($diffs>0){
         if(date_diff($sle,$cls)->format("%R%a")<=1){
            Toastr::warning('Leave dates not valid! Clashing with cl');
            return redirect()->route('leave.create');  
         }               
        }else{
            if(date_diff($cle,$sls)->format("%R%a")<=1){
                Toastr::warning('Leave dates not valid! Clashing with cl');
                return redirect()->route('leave.create');   
        }
       }
   
    }
}elseif($lt=='vac'){

    $curVac = DB::select(' select * from vac_days order by id desc limit 1');
    
                  $cure=date_create($curVac[0]->to_date);
                  $le=date_create($request->vacdate_to);
                  $ls=date_create($request->vacdate_from);
                  $curs=date_create($curVac[0]->from_date);
                  if(date_diff($ls , $curs)->format("%R%a")>0 ||date_diff($le, $cure)->format("%R%a")<0  ){
                    Toastr::warning('Enter vacation dates as per this semester!');
                    return redirect()->route('leave.create');
                  }
                }
        $ans =Leave::where('employee_id',$id)->get();
                foreach ($ans as $value) {
                  $date_to = $lt.'date_to';
                  $date_from = $lt.'date_from';
                  
                  $sle=date_create($value->date_to);
                  $cle=date_create($request->$date_to);
                  $cls=date_create($request->$date_from);
                  $sls=date_create($value->date_from);
                  
                $diffs=date_diff($sls,$cls)->format("%R%a");
                if($diffs>0){
                 if(date_diff($sle,$cls)->format("%R%a")<=0){
                    Toastr::warning('Leave dates already taken!');
                    return redirect()->route('leave.create');  
                 }               
                }else{
                    if(date_diff($cle,$sls)->format("%R%a")<=0){
                        Toastr::warning('Leave dates already taken!');
                        return redirect()->route('leave.create');   
                }
               }
           
            }
            if($cnt-$days<0){
                Toastr::success('Not enough leaves in balance');
                return redirect()->route('leave');
            }
            else{
                
                if($lt=="sl"){
                    $leav=new Leave;
        $leav->employee_id=$idd ;
        $leav->leave_type = $request->input('leave_type');
        $leav->date_from = $request->input('sldate_from');
        $leav->date_to = $request->input('sldate_to');
        $leav->days = $request->input('sldays');
        $leav->reason = $request->input('slreason');
        $leav->department = $user->department;
        $leav->rejectionreason = $request->rejectionreason;
        $leav->remark = $request->remark;
        $leav->image = $filename;
        $leav->save();
  Toastr::success('Leave successfully requested!','Success');
                    return redirect()->route('leave');
                }elseif($lt=="cl"){
                  
                    $leav=new Leave;
        $leav->employee_id=$idd ;
        $leav->leave_type = $request->input('leave_type');
        $leav->date_from = $request->input('cldate_from');
        $leav->date_to = $request->input('cldate_to');
        $leav->days = $request->input('cldays');
        $leav->reason = $request->input('clreason');
        $leav->department = $user->department;
        $leav->rejectionreason = $request->rejectionreason;
        $leav->remark = $request->remark;
        $leav->image = $filename;
        $leav->save();
                    Toastr::success('Leave successfully requested !','Success');
                    return redirect()->route('leave');
        
                }elseif($lt=="vac"){
                    $leav=new Leave;
                    $leav->employee_id=$idd ;
                    $leav->leave_type = $request->input('leave_type');
                    $leav->date_from = $request->input('vacdate_from');
                    $leav->date_to = $request->input('vacdate_to');
                    $leav->days = $request->input('vacdays');
                    $leav->reason = $request->input('vacreason');
                    $leav->department = $user->department;
                    $leav->rejectionreason = $request->rejectionreason;
                    $leav->remark = $request->remark;
                    $leav->image = $filename;
                    $leav->save();
                    Toastr::success('Leave successfully requested!','Success');
                    return redirect()->route('leave');
        
                }elseif($lt=="od"){
                    $leav=new Leave;
        $leav->employee_id=$idd ;
        $leav->leave_type = $request->input('leave_type');
        $leav->date_from = $request->input('oddate_from');
        $leav->date_to = $request->input('oddate_to');
        $leav->days = $request->input('oddays');
        $leav->reason = $request->input('odreason');
        $leav->department = $user->department;
        $leav->rejectionreason = $request->rejectionreason;
        $leav->remark = $request->remark;
        $leav->image = $filename;
        $leav->save();
                    Toastr::success('Leave successfully requested !','Success');
                    return redirect()->route('leave');
        
                }elseif($lt=="early"){
                    $leav=new Leave;
        $leav->employee_id=$idd ;
        $leav->leave_type = $request->input('leave_type');
        $leav->date_from = $request->input('earlydate_from');
        $leav->date_to = $request->input('earlydate_to');
        $leav->days = $request->input('earlydays');
        $leav->reason = $request->input('earlyreason');
        $leav->department = $user->department;
        $leav->rejectionreason = $request->rejectionreason;
        $leav->remark = $request->remark;
        $leav->image = $filename;
        $leav->save();
                    Toastr::success('Leave successfully requested !','Success');
                    return redirect()->route('leave');
        
        
            }
            return redirect()->route('leave');
    }

    }
    public function approve(Request $request,$id)
    {

   
        $leave = Leave::find($id);

        if($leave){
            $leave->is_approved = $request ->approve;
            if($leave->is_approved=='1'){
            $user = $leave->employee_id;
            $lt = $leave->leave_type;
            $usr =User::find($user);
            $cnt=$usr->$lt;
            $usr->$lt=$cnt-$leave->days;
            $usr->save();
            
            }
            else{
                $leave->rejectionreason =$request->input('rejectionreason');
                
            }
            $leave->save();
            return redirect()->back();
        }
    }
    public function remark(Request $request,$id)
    {

        
        $leave = Leave::find($id);
        

       
            $leave->remark =$request->input('remark');
            
            $leave->save();
            return redirect()->back();
       
    }
    public function status(Request $request,$id)
    {

    
        $leave = Leave::find($id);

       if($leave){
           $leave->status = $request -> approve;
           $leave->save();
           return redirect()->back();
       }
    }

    public function paid(Request $request,$id)
    {
        $leave = Leave::find($id);
        if($leave){
            $leave->leave_type_offer = $request -> paid;
            $leave->save();
            return redirect()->back();
        }
    }
    public function delete($id)
    {
        
        $leave = Leave::find($id);
        $leave -> delete();
        Toastr::error('Leave successfully deleted!','Deleted');
        return redirect()->back();
    }
    public function deductcl($id)
    {
        $user = User::find($id);
        $cnt = $user->cl;
        if($cnt>0){
            $user->cl=$cnt-0.5;
            $user->late_count=0;
            $user->save();
            $msg="CL deducted of ".$user->first_name;
            Toastr::warning($msg);
        }else{
            Toastr::warning("Not enough CLs to deduct");
        }
        
        return redirect()->back();
    }
    public function latecnt($id)
    {
        $user = User::find($id);
        $cnt = $user->late_count;
        $user->late_count=$cnt+1;
        $user->save();
        return redirect()->back();
    }

}
